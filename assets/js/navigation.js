(function () {
	'use strict';

	const toggle = document.querySelector('.menu-toggle');
	const navigation = document.querySelector('.main-navigation');
	const searchToggle = document.querySelector('.search-toggle');
	const searchPanel = document.querySelector('.header-search');
	const header = document.querySelector('.site-header');

	document.documentElement.classList.remove('no-js');

	const closeMenu = function () {
		if (!toggle || !navigation) return;
		toggle.setAttribute('aria-expanded', 'false');
		navigation.classList.remove('is-open');
		document.body.classList.remove('menu-open');
	};

	const closeSearch = function () {
		if (!searchToggle || !searchPanel) return;
		searchToggle.setAttribute('aria-expanded', 'false');
		searchPanel.hidden = true;
	};

	if (toggle && navigation) {
		toggle.addEventListener('click', function () {
			const expanded = toggle.getAttribute('aria-expanded') === 'true';
			closeSearch();
			toggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
			navigation.classList.toggle('is-open', !expanded);
			document.body.classList.toggle('menu-open', !expanded);
		});

		navigation.addEventListener('click', function (event) {
			if (event.target.closest('a')) closeMenu();
		});
	}

	if (searchToggle && searchPanel) {
		searchToggle.addEventListener('click', function () {
			const expanded = searchToggle.getAttribute('aria-expanded') === 'true';
			closeMenu();
			searchToggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
			searchPanel.hidden = expanded;
			if (!expanded) {
				const field = searchPanel.querySelector('.search-field');
				if (field) field.focus();
			}
		});
	}

	document.addEventListener('keyup', function (event) {
		if (event.key !== 'Escape') return;
		const searchWasOpen = searchToggle && searchToggle.getAttribute('aria-expanded') === 'true';
		closeMenu();
		closeSearch();
		if (searchWasOpen) searchToggle.focus();
	});

	document.addEventListener('click', function (event) {
		if (header && !header.contains(event.target)) {
			closeMenu();
			closeSearch();
		}
	});

	window.matchMedia('(min-width: 761px)').addEventListener('change', function (event) {
		if (event.matches) closeMenu();
	});
}());
