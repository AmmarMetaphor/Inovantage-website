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

  const parallaxHero = document.querySelector('[data-hero-parallax]');

  if (parallaxHero) {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    let bounds = null;
    let frame = 0;
    let pointerX = 0;
    let pointerY = 0;
    let offsetX = 0;
    let offsetY = 0;

    const canAnimate = () => !reducedMotion.matches;
    const clamp = (value) => Math.max(-1, Math.min(1, value));

    // All layout reads and style writes happen here, at most once per frame.
    const render = () => {
      frame = 0;
      if (!bounds) bounds = parallaxHero.getBoundingClientRect();
      if (bounds.width && bounds.height) {
        offsetX = clamp(((pointerX - bounds.left) / bounds.width) * 2 - 1);
        offsetY = clamp(((pointerY - bounds.top) / bounds.height) * 2 - 1);
      }
      parallaxHero.style.setProperty('--hero-x', offsetX.toFixed(3));
      parallaxHero.style.setProperty('--hero-y', offsetY.toFixed(3));
    };

    const schedule = () => {
      if (!frame) frame = requestAnimationFrame(render);
    };

    const rest = () => {
      if (frame) {
        cancelAnimationFrame(frame);
        frame = 0;
      }
      offsetX = 0;
      offsetY = 0;
      parallaxHero.classList.remove('is-pointer-active');
      parallaxHero.style.setProperty('--hero-x', '0');
      parallaxHero.style.setProperty('--hero-y', '0');
    };

    // Only a real mouse parallaxes. Touch and pen report their own pointerType,
    // so touch devices never start the animation.
    const track = (event) => {
      if (event.pointerType !== 'mouse' || !canAnimate()) return;
      pointerX = event.clientX;
      pointerY = event.clientY;
      parallaxHero.classList.add('is-pointer-active');
      schedule();
    };

    parallaxHero.addEventListener('pointerenter', track, { passive: true });
    parallaxHero.addEventListener('pointermove', track, { passive: true });
    parallaxHero.addEventListener('pointerleave', rest, { passive: true });
    parallaxHero.addEventListener('pointercancel', rest, { passive: true });

    const invalidate = () => { bounds = null; };
    window.addEventListener('scroll', invalidate, { passive: true });
    window.addEventListener('resize', invalidate, { passive: true });

    if (typeof reducedMotion.addEventListener === 'function') {
      reducedMotion.addEventListener('change', () => { if (!canAnimate()) rest(); });
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
