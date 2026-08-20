(() => {
  const toggle = document.querySelector('[data-menu-toggle]');
  const menu = document.querySelector('[data-menu]');

  if (toggle && menu) {
    const closeMenu = () => {
      toggle.setAttribute('aria-expanded', 'false');
      menu.classList.remove('is-open');
      document.body.classList.remove('menu-open');
    };

    toggle.addEventListener('click', () => {
      const isOpen = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!isOpen));
      menu.classList.toggle('is-open', !isOpen);
      document.body.classList.toggle('menu-open', !isOpen);
    });

    menu.addEventListener('click', (event) => {
      if (event.target.closest('a')) closeMenu();
    });

    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') closeMenu();
    });

    window.addEventListener('resize', () => {
      if (window.innerWidth > 1040) closeMenu();
    });
  }

  // Homepage only: initialises solely when the homepage hero is on the page.
  const parallaxHero = document.querySelector('[data-hero-parallax]');

  if (parallaxHero) {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    // How much of the remaining distance each frame closes. Lower is heavier.
    const EASE = 0.09;
    const SETTLED = 0.0005;

    let bounds = null;
    let frame = 0;
    let pointerX = 0;
    let pointerY = 0;
    // Where the artwork is being pulled towards, and where it actually is.
    const target = { x: 0, y: 0, active: 0 };
    const current = { x: 0, y: 0, active: 0 };

    const canAnimate = () => !reducedMotion.matches;
    const clamp = (value) => Math.max(-1, Math.min(1, value));

    const write = () => {
      parallaxHero.style.setProperty('--hero-x', current.x.toFixed(4));
      parallaxHero.style.setProperty('--hero-y', current.y.toFixed(4));
      parallaxHero.style.setProperty('--hero-active', current.active.toFixed(4));
    };

    // The only place that reads layout or writes style, once per frame. Values
    // chase their targets instead of jumping, which is what gives the glide.
    const render = () => {
      if (target.active) {
        if (!bounds) bounds = parallaxHero.getBoundingClientRect();
        if (bounds.width && bounds.height) {
          target.x = clamp(((pointerX - bounds.left) / bounds.width) * 2 - 1);
          target.y = clamp(((pointerY - bounds.top) / bounds.height) * 2 - 1);
        }
      }

      let moving = false;
      for (const key of ['x', 'y', 'active']) {
        const delta = target[key] - current[key];
        if (Math.abs(delta) < SETTLED) current[key] = target[key];
        else { current[key] += delta * EASE; moving = true; }
      }

      write();
      frame = moving ? requestAnimationFrame(render) : 0;
    };

    const schedule = () => {
      if (!frame) frame = requestAnimationFrame(render);
    };

    // Glide back to centre rather than snapping, so leaving feels like the
    // pointer released the artwork.
    const rest = () => {
      target.x = 0;
      target.y = 0;
      target.active = 0;
      schedule();
    };

    // Only a real mouse parallaxes. Touch and pen report their own pointerType,
    // and a tap is followed by synthetic mouse events that claim pointerType
    // "mouse", so anything arriving just after a touch is ignored too. That
    // keeps touch devices completely still without penalising a hybrid device
    // whose user picks the mouse back up.
    const TOUCH_GRACE = 900;
    let lastTouchAt = -Infinity;

    const track = (event) => {
      if (event.pointerType !== 'mouse') {
        lastTouchAt = event.timeStamp;
        return;
      }
      if (!canAnimate() || event.timeStamp - lastTouchAt < TOUCH_GRACE) return;
      pointerX = event.clientX;
      pointerY = event.clientY;
      target.active = 1;
      schedule();
    };

    parallaxHero.addEventListener('pointerenter', track, { passive: true });
    parallaxHero.addEventListener('pointermove', track, { passive: true });
    parallaxHero.addEventListener('pointerdown', track, { passive: true });
    parallaxHero.addEventListener('pointerleave', rest, { passive: true });
    parallaxHero.addEventListener('pointercancel', rest, { passive: true });

    const invalidate = () => { bounds = null; };
    window.addEventListener('scroll', invalidate, { passive: true });
    window.addEventListener('resize', invalidate, { passive: true });

    if (typeof reducedMotion.addEventListener === 'function') {
      reducedMotion.addEventListener('change', () => { if (!canAnimate()) rest(); });
    }
  }

  // Services page only: initialises solely when the orbit is on the page.
  const servicesOrbit = document.querySelector('[data-services-orbit]');

  if (servicesOrbit) {
    // Freezing every card while the pointer is on one keeps the link still
    // under the cursor. Keyboard focus is handled by :focus-within in CSS.
    const overCard = (node) => node instanceof Element && node.closest('.orbit-card');

    servicesOrbit.addEventListener('pointerover', (event) => {
      if (event.pointerType !== 'mouse') return;
      if (overCard(event.target)) servicesOrbit.classList.add('is-paused');
    });

    servicesOrbit.addEventListener('pointerout', (event) => {
      if (event.pointerType !== 'mouse') return;
      if (!overCard(event.relatedTarget)) servicesOrbit.classList.remove('is-paused');
    });

    servicesOrbit.addEventListener('pointerleave', () => {
      servicesOrbit.classList.remove('is-paused');
    });
  }

  // Case studies page only: initialises solely when its hero is on the page.
  const caseHero = document.querySelector('[data-case-hero]');

  if (caseHero) {
    const caseOrbit = caseHero.querySelector('[data-case-orbit]');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    // Freezing every card while the pointer is on one keeps the link still
    // under the cursor. Keyboard focus is handled by :focus-within in CSS.
    if (caseOrbit) {
      const overCard = (node) => node instanceof Element && node.closest('.case-card');

      caseOrbit.addEventListener('pointerover', (event) => {
        if (event.pointerType !== 'mouse') return;
        if (overCard(event.target)) caseOrbit.classList.add('is-paused');
      });

      caseOrbit.addEventListener('pointerout', (event) => {
        if (event.pointerType !== 'mouse') return;
        if (!overCard(event.relatedTarget)) caseOrbit.classList.remove('is-paused');
      });

      caseOrbit.addEventListener('pointerleave', () => {
        caseOrbit.classList.remove('is-paused');
      });
    }

    // Pointer parallax and proximity, on the decorative field only. Same
    // per-frame interpolation as the homepage hero: nothing reads layout or
    // writes style outside render().
    const EASE = 0.1;
    const SETTLED = 0.0005;
    const TOUCH_GRACE = 900;

    let bounds = null;
    let frame = 0;
    let pointerX = 0;
    let pointerY = 0;
    let lastTouchAt = -Infinity;
    const target = { x: 0, y: 0, near: 0 };
    const current = { x: 0, y: 0, near: 0 };

    const clamp = (value) => Math.max(-1, Math.min(1, value));

    const render = () => {
      if (target.near || pointerX || pointerY) {
        if (!bounds) bounds = caseHero.getBoundingClientRect();
        if (bounds.width && bounds.height) {
          const nx = clamp(((pointerX - bounds.left) / bounds.width) * 2 - 1);
          const ny = clamp(((pointerY - bounds.top) / bounds.height) * 2 - 1);
          if (target.near) {
            target.x = nx;
            target.y = ny;
            // The core sits towards the right of the hero, so proximity is
            // measured from there rather than from the middle.
            const dx = nx - 0.45;
            const dy = ny;
            target.near = Math.max(0, 1 - Math.hypot(dx, dy) / 1.1);
          }
        }
      }

      let moving = false;
      for (const key of ['x', 'y', 'near']) {
        const delta = target[key] - current[key];
        if (Math.abs(delta) < SETTLED) current[key] = target[key];
        else { current[key] += delta * EASE; moving = true; }
      }

      caseHero.style.setProperty('--case-x', current.x.toFixed(4));
      caseHero.style.setProperty('--case-y', current.y.toFixed(4));
      caseHero.style.setProperty('--case-near', current.near.toFixed(4));
      frame = moving ? requestAnimationFrame(render) : 0;
    };

    const schedule = () => {
      if (!frame) frame = requestAnimationFrame(render);
    };

    const rest = () => {
      target.x = 0;
      target.y = 0;
      target.near = 0;
      schedule();
    };

    const track = (event) => {
      if (event.pointerType !== 'mouse') {
        lastTouchAt = event.timeStamp;
        return;
      }
      if (reducedMotion.matches || event.timeStamp - lastTouchAt < TOUCH_GRACE) return;
      pointerX = event.clientX;
      pointerY = event.clientY;
      target.near = 1;
      schedule();
    };

    caseHero.addEventListener('pointerenter', track, { passive: true });
    caseHero.addEventListener('pointermove', track, { passive: true });
    caseHero.addEventListener('pointerleave', rest, { passive: true });
    caseHero.addEventListener('pointercancel', rest, { passive: true });

    const invalidate = () => { bounds = null; };
    window.addEventListener('scroll', invalidate, { passive: true });
    window.addEventListener('resize', invalidate, { passive: true });

    if (typeof reducedMotion.addEventListener === 'function') {
      reducedMotion.addEventListener('change', () => { if (reducedMotion.matches) rest(); });
    }
  }

  // Case study category filter. Cards carry their category, so filtering is a
  // hidden flag per card rather than a re-render.
  const caseFilterGroup = document.querySelector('[data-case-filter-group]');

  if (caseFilterGroup) {
    caseFilterGroup.addEventListener('click', (event) => {
      const button = event.target.closest('[data-case-filter]');
      if (!button) return;
      const filter = button.dataset.caseFilter;

      caseFilterGroup.querySelectorAll('[data-case-filter]').forEach((item) => {
        const active = item === button;
        item.classList.toggle('is-active', active);
        item.setAttribute('aria-pressed', String(active));
      });

      document.querySelectorAll('[data-case-card]').forEach((card) => {
        card.hidden = filter !== 'all' && card.dataset.category !== filter;
      });
    });
  }

  // About page only: initialises solely when the continuous canvas is present.
  //
  // One rAF loop drives the whole page. It writes three custom properties and
  // nothing else: --about-p (scroll progress 0..1, which the display words ride)
  // and --about-px/--about-py (eased pointer offset, -1..1, which shifts the
  // field plates by a few pixels each). The field's own drift is CSS keyframes
  // on transform, so the compositor owns it and the loop never touches it.
  const aboutCanvas = document.querySelector('[data-about-canvas]');

  if (aboutCanvas) {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const coarsePointer = window.matchMedia('(hover: none), (pointer: coarse)');

    const EASE = 0.08;
    const SETTLED = 0.0008;
    const TOUCH_GRACE = 900;

    let frame = 0;
    let pointerX = 0;
    let pointerY = 0;
    let lastTouchAt = -Infinity;
    let scrollDirty = true;

    const target = { x: 0, y: 0 };
    const current = { x: 0, y: 0, p: -1 };

    const clamp = (value) => Math.max(-1, Math.min(1, value));

    // Progress of the canvas through the viewport, 0 at the top of the page to
    // 1 when its end reaches the bottom. Read once per frame, never per event.
    const readProgress = () => {
      const rect = aboutCanvas.getBoundingClientRect();
      const travel = rect.height - window.innerHeight;
      if (travel <= 0) return 0;
      return Math.max(0, Math.min(1, -rect.top / travel));
    };

    const render = () => {
      let moving = false;

      if (scrollDirty) {
        const p = readProgress();
        if (Math.abs(p - current.p) > 0.0005) {
          current.p = p;
          aboutCanvas.style.setProperty('--about-p', p.toFixed(4));
        }
        scrollDirty = false;
      }

      for (const key of ['x', 'y']) {
        const delta = target[key] - current[key];
        if (Math.abs(delta) < SETTLED) {
          current[key] = target[key];
        } else {
          current[key] += delta * EASE;
          moving = true;
        }
      }
      aboutCanvas.style.setProperty('--about-px', current.x.toFixed(4));
      aboutCanvas.style.setProperty('--about-py', current.y.toFixed(4));

      frame = moving ? requestAnimationFrame(render) : 0;
    };

    const schedule = () => {
      if (!frame && !document.hidden) frame = requestAnimationFrame(render);
    };

    const onScroll = () => {
      scrollDirty = true;
      schedule();
    };

    // Only a real mouse moves the field, and only by a few pixels. Touch
    // reports its own pointerType, and the synthetic mouse events that follow a
    // tap are ignored for a moment afterwards.
    const track = (event) => {
      if (event.pointerType !== 'mouse') {
        lastTouchAt = event.timeStamp;
        return;
      }
      if (reducedMotion.matches || coarsePointer.matches) return;
      if (event.timeStamp - lastTouchAt < TOUCH_GRACE) return;
      pointerX = event.clientX;
      pointerY = event.clientY;
      target.x = clamp((pointerX / window.innerWidth) * 2 - 1);
      target.y = clamp((pointerY / window.innerHeight) * 2 - 1);
      schedule();
    };

    const rest = () => {
      target.x = 0;
      target.y = 0;
      schedule();
    };

    // Each display word is pinned to the movement it belongs to. The CSS
    // anchors are a fallback for fractions of the whole document; those drift
    // out of step with the movements as the viewport height changes, which can
    // park a word in the empty band between two of them. Measuring puts every
    // word centred on its own movement at any width.
    const marks = [...aboutCanvas.querySelectorAll('[data-ed-mark]')];

    const placeMarks = () => {
      if (!marks.length) return;
      const canvasTop = aboutCanvas.getBoundingClientRect().top + window.scrollY;
      const travel = aboutCanvas.offsetHeight - window.innerHeight;
      if (travel <= 0) return;

      for (const mark of marks) {
        const movement = aboutCanvas.querySelector(
          '[data-ed-anchor="' + mark.dataset.edMark + '"]'
        );
        if (!movement) continue;
        const box = movement.getBoundingClientRect();
        const centre = box.top + window.scrollY + box.height / 2;
        const anchor = (centre - window.innerHeight / 2 - canvasTop) / travel;
        mark.style.setProperty('--mark-anchor', Math.max(0, Math.min(1, anchor)).toFixed(4));
      }
    };

    let placeTimer = 0;
    const replaceMarks = () => {
      window.clearTimeout(placeTimer);
      placeTimer = window.setTimeout(placeMarks, 140);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', () => { onScroll(); replaceMarks(); }, { passive: true });
    document.addEventListener('pointermove', track, { passive: true });
    document.addEventListener('pointerleave', rest, { passive: true });

    // Nothing renders while the tab is in the background.
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        if (frame) cancelAnimationFrame(frame);
        frame = 0;
      } else {
        scrollDirty = true;
        schedule();
      }
    });

    onScroll();
    placeMarks();

    // Scroll reveal. The hiding class is only added once this code is running
    // and IntersectionObserver is known to exist, so content is never hidden by
    // a stylesheet that no script can undo.
    if ('IntersectionObserver' in window && !reducedMotion.matches) {
      // One unit per element rather than one per movement: a movement-sized
      // unit animates the page in six blocks, which re-segments exactly what
      // the layout dissolves. The value cards are units in their own right,
      // so the six of them arrive as the reader reaches each one.
      const units = [];
      for (const movement of aboutCanvas.querySelectorAll('.about-movement')) {
        for (const child of movement.children) {
          if (child.classList.contains('value-stack')) {
            for (const item of child.children) units.push(item);
          } else {
            units.push(child);
          }
        }
      }

      units.forEach((unit, index) => {
        unit.setAttribute('data-ed-reveal', '');
        unit.style.setProperty('--r-i', String(index % 4));
      });
      aboutCanvas.classList.add('is-observed');

      const observer = new IntersectionObserver((entries) => {
        for (const entry of entries) {
          if (!entry.isIntersecting) continue;
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      }, { rootMargin: '0px 0px -12% 0px', threshold: 0.08 });

      for (const unit of units) observer.observe(unit);

      // Whatever is already on screen is shown immediately, and a backstop
      // reveals everything if any observation never fires.
      window.setTimeout(() => {
        for (const unit of units) unit.classList.add('is-visible');
      }, 2600);
    }

    if (typeof reducedMotion.addEventListener === 'function') {
      reducedMotion.addEventListener('change', () => {
        if (reducedMotion.matches) rest();
      });
    }
  }

  const filterGroup = document.querySelector('[data-filter-group]');
  const insightCards = [...document.querySelectorAll('[data-insight-card]')];

  if (filterGroup && insightCards.length) {
    filterGroup.addEventListener('click', (event) => {
      const button = event.target.closest('[data-filter]');
      if (!button) return;
      const filter = button.dataset.filter;
      filterGroup.querySelectorAll('[data-filter]').forEach((item) => {
        item.classList.toggle('is-active', item === button);
      });
      insightCards.forEach((card) => {
        card.hidden = filter !== 'all' && card.dataset.category !== filter;
      });
    });
  }

})();
