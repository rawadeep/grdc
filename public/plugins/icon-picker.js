(function () {
    'use strict';
    class FontAwesomeIconPicker {
        constructor(element, options = {}) {
            this.element = element;
            this.options = {
                icons: options.icons || this.getDefaultIcons(),
                placeholder: options.placeholder || 'Select an icon',
                searchPlaceholder: options.searchPlaceholder || 'Search icons...',
                ...options
            };

            this.selectedIcon = '';
            this.isOpen = false;

            this.init();
        }

        getDefaultIcons() {
            // Common FontAwesome free icons
            return [
                'fas fa-home', 'fas fa-user', 'fas fa-envelope', 'fas fa-phone', 'fas fa-heart',
                'fas fa-star', 'fas fa-check', 'fas fa-times', 'fas fa-plus', 'fas fa-minus',
                'fas fa-search', 'fas fa-edit', 'fas fa-trash', 'fas fa-save', 'fas fa-download',
                'fas fa-upload', 'fas fa-print', 'fas fa-share', 'fas fa-lock', 'fas fa-unlock',
                'fas fa-key', 'fas fa-shield-alt', 'fas fa-eye', 'fas fa-eye-slash', 'fas fa-calendar',
                'fas fa-clock', 'fas fa-map-marker-alt', 'fas fa-globe', 'fas fa-camera', 'fas fa-image',
                'fas fa-video', 'fas fa-music', 'fas fa-headphones', 'fas fa-microphone', 'fas fa-volume-up',
                'fas fa-car', 'fas fa-plane', 'fas fa-train', 'fas fa-bicycle', 'fas fa-walking',
                'fas fa-shopping-cart', 'fas fa-credit-card', 'fas fa-money-bill', 'fas fa-gift', 'fas fa-tag',
                'fas fa-bookmark', 'fas fa-book', 'fas fa-graduation-cap', 'fas fa-briefcase', 'fas fa-building',
                'fas fa-hospital', 'fas fa-ambulance', 'fas fa-medkit', 'fas fa-pills', 'fas fa-heartbeat',
                'fas fa-coffee', 'fas fa-utensils', 'fas fa-pizza-slice', 'fas fa-wine-glass', 'fas fa-beer',
                'fas fa-gamepad', 'fas fa-puzzle-piece', 'fas fa-chess', 'fas fa-dice', 'fas fa-football-ball',
                'fas fa-basketball-ball', 'fas fa-baseball-ball', 'fas fa-tennis-ball', 'fas fa-golf-ball', 'fas fa-swimming-pool',
                'fas fa-tree', 'fas fa-leaf', 'fas fa-seedling', 'fas fa-sun', 'fas fa-moon',
                'fas fa-cloud', 'fas fa-snowflake', 'fas fa-fire', 'fas fa-bolt', 'fas fa-rainbow',
                'fas fa-bell', 'fas fa-envelope-open', 'fas fa-comment', 'fas fa-comments', 'fas fa-thumbs-up',
                'fas fa-thumbs-down', 'fas fa-flag', 'fas fa-trophy', 'fas fa-award', 'fas fa-medal',
                'far fa-heart', 'far fa-star', 'far fa-bookmark', 'far fa-calendar', 'far fa-clock',
                'far fa-envelope', 'far fa-file', 'far fa-folder', 'far fa-image', 'far fa-user',
                'far fa-comment', 'far fa-comments', 'far fa-thumbs-up', 'far fa-thumbs-down', 'far fa-eye',
                'fas fa-handshake', 'fas fa-chart-pie', 'fas fa-users', 'fas fa-chart-line', 'fas fa-book-open',
                'fas fa-cogs', 'fas fa-lightbulb', 'fas fa-water', 'fas fa-mountain', 'fas fa-file-pdf', 'fas fa-chart-bar',
                'fas fa-map-marked-alt', 'fas fa-balance-scale', 'fas fa-vial', 'fas fa-database'
            ];
        }

        init() {
            this.container = this.element.closest('.icon-picker-container');
            this.input = this.container.querySelector('.icon-picker-input');
            this.trigger = this.container.querySelector('.icon-picker-trigger');
            this.dropdown = this.container.querySelector('.icon-picker-dropdown');
            this.searchInput = this.dropdown.querySelector('.icon-picker-search');
            this.grid = this.dropdown.querySelector('.icon-picker-grid');

            this.setupEventListeners();
            this.renderIcons();
        }

        setupEventListeners() {
            // Toggle dropdown
            this.input.addEventListener('click', (e) => {
                e.preventDefault();
                this.toggle();
            });

            this.trigger.addEventListener('click', (e) => {
                e.preventDefault();
                this.toggle();
            });

            // Search functionality
            this.searchInput.addEventListener('input', (e) => {
                this.filterIcons(e.target.value);
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!this.container.contains(e.target)) {
                    this.close();
                }
            });

            // Prevent form submission when clicking inside dropdown
            this.dropdown.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }

        toggle() {
            if (this.isOpen) {
                this.close();
            } else {
                this.open();
            }
        }

        open() {
            this.dropdown.style.display = 'block';
            this.isOpen = true;
            this.searchInput.focus();
            this.trigger.innerHTML = '<i class="fas fa-chevron-up"></i>';
        }

        close() {
            this.dropdown.style.display = 'none';
            this.isOpen = false;
            this.searchInput.value = '';
            this.trigger.innerHTML = '<i class="fas fa-chevron-down"></i>';
            this.renderIcons(); // Reset filter
        }

        renderIcons(iconsToShow = this.options.icons) {
            this.grid.innerHTML = '';

            if (iconsToShow.length === 0) {
                this.grid.innerHTML = '<div class="icon-picker-no-results">No icons found</div>';
                return;
            }

            iconsToShow.forEach(iconClass => {
                const item = document.createElement('div');
                item.className = 'icon-picker-item';
                if (iconClass === this.selectedIcon) {
                    item.classList.add('selected');
                }

                const iconName = iconClass.replace('fas fa-', '').replace('far fa-', '');

                item.innerHTML = `
                            <i class="${iconClass}"></i>
                            <span>${iconName}</span>
                        `;

                item.addEventListener('click', () => {
                    this.selectIcon(iconClass);
                });

                this.grid.appendChild(item);
            });
        }

        selectIcon(iconClass) {
            this.selectedIcon = iconClass;

            // Update input display
            this.input.innerHTML = `
                        <div class="selected-icon-preview">
                            <i class="${iconClass}"></i>
                            <span>${iconClass}</span>
                        </div>
                    `;

            // Set the actual value for form submission
            this.element.value = iconClass;

            // Trigger change event
            const event = new Event('change', { bubbles: true });
            this.element.dispatchEvent(event);

            this.close();
        }

        filterIcons(searchTerm) {
            const filteredIcons = this.options.icons.filter(iconClass =>
                iconClass.toLowerCase().includes(searchTerm.toLowerCase())
            );
            this.renderIcons(filteredIcons);
        }

        setValue(iconClass) {
            if (this.options.icons.includes(iconClass)) {
                this.selectIcon(iconClass);
            }
        }

        getValue() {
            return this.selectedIcon;
        }
    }
    window.FontAwesomeIconPicker = FontAwesomeIconPicker;
})();