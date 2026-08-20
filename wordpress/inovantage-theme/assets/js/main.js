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
