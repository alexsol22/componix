/**
 * Componix JavaScript - Interactive functionality for Laravel Livewire Components
 */

// Main Componix object
window.Componix = {
    // Configuration
    config: {
        debug: false,
        animations: true,
        autoInit: true
    },

    // Initialize all components
    init() {
        if (this.config.debug) {
            console.log('Componix: Initializing components...');
        }

        this.initModals();
        this.initNavbars();
        this.initAlerts();
        this.initSearch();
        this.initButtons();

        if (this.config.debug) {
            console.log('Componix: All components initialized');
        }
    },

    // Modal functionality
    initModals() {
        // Listen for modal events
        document.addEventListener('openModal', (event) => {
            this.openModal(event.detail);
        });

        document.addEventListener('closeModal', () => {
            this.closeModal();
        });

        // Close modal on backdrop click
        document.addEventListener('click', (event) => {
            if (event.target.classList.contains('componix-modal-backdrop')) {
                this.closeModal();
            }
        });

        // Close modal on escape key
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                this.closeModal();
            }
        });
    },

    openModal(options = {}) {
        const { title = '', content = '', size = 'md' } = options;
        
        // Dispatch Livewire event
        if (window.Livewire) {
            window.Livewire.emit('openModal', { title, content, size });
        }

        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    },

    closeModal() {
        // Dispatch Livewire event
        if (window.Livewire) {
            window.Livewire.emit('closeModal');
        }

        // Restore body scroll
        document.body.style.overflow = '';
    },

    // Navbar functionality
    initNavbars() {
        // Mobile menu toggles
        document.querySelectorAll('.componix-navbar-mobile-button').forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const navbar = button.closest('.componix-navbar');
                const mobileMenu = navbar.querySelector('.componix-navbar-mobile-menu');
                
                if (mobileMenu) {
                    mobileMenu.classList.toggle('hidden');
                    
                    // Update aria-expanded
                    const isExpanded = !mobileMenu.classList.contains('hidden');
                    button.setAttribute('aria-expanded', isExpanded);
                }
            });
        });

        // Dropdown toggles
        document.querySelectorAll('.componix-navbar-dropdown').forEach(dropdown => {
            const trigger = dropdown.querySelector('[data-dropdown-trigger]');
            const menu = dropdown.querySelector('.componix-navbar-dropdown-menu');
            
            if (trigger && menu) {
                trigger.addEventListener('click', (event) => {
                    event.preventDefault();
                    menu.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', (event) => {
                    if (!dropdown.contains(event.target)) {
                        menu.classList.add('hidden');
                    }
                });
            }
        });
    },

    // Alert functionality
    initAlerts() {
        // Auto-dismiss alerts
        document.querySelectorAll('[data-auto-dismiss]').forEach(alert => {
            const delay = parseInt(alert.dataset.autoDismiss) || 5000;
            
            setTimeout(() => {
                this.dismissAlert(alert);
            }, delay);
        });

        // Dismiss button functionality
        document.querySelectorAll('.componix-alert-dismiss').forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const alert = button.closest('.componix-alert');
                this.dismissAlert(alert);
            });
        });
    },

    dismissAlert(alert) {
        if (!alert) return;

        if (this.config.animations) {
            alert.style.transition = 'all 0.3s ease-out';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            
            setTimeout(() => {
                alert.remove();
            }, 300);
        } else {
            alert.remove();
        }
    },

    // Search functionality
    initSearch() {
        document.querySelectorAll('.componix-search').forEach(searchContainer => {
            const input = searchContainer.querySelector('.componix-search-input');
            const results = searchContainer.querySelector('.componix-search-results');
            
            if (!input) return;

            let debounceTimer;
            let currentRequest;

            input.addEventListener('input', (event) => {
                const query = event.target.value.trim();
                const minChars = parseInt(input.dataset.minChars) || 2;

                clearTimeout(debounceTimer);

                if (query.length < minChars) {
                    this.hideSearchResults(results);
                    return;
                }

                debounceTimer = setTimeout(() => {
                    this.performSearch(searchContainer, query);
                }, parseInt(input.dataset.debounce) || 300);
            });

            // Hide results when clicking outside
            document.addEventListener('click', (event) => {
                if (!searchContainer.contains(event.target)) {
                    this.hideSearchResults(results);
                }
            });

            // Keyboard navigation
            input.addEventListener('keydown', (event) => {
                if (!results || results.classList.contains('hidden')) return;

                const items = results.querySelectorAll('.componix-search-result-item');
                const activeItem = results.querySelector('.componix-search-result-item-active');
                let activeIndex = Array.from(items).indexOf(activeItem);

                switch (event.key) {
                    case 'ArrowDown':
                        event.preventDefault();
                        activeIndex = Math.min(activeIndex + 1, items.length - 1);
                        this.setActiveSearchItem(items, activeIndex);
                        break;
                    case 'ArrowUp':
                        event.preventDefault();
                        activeIndex = Math.max(activeIndex - 1, 0);
                        this.setActiveSearchItem(items, activeIndex);
                        break;
                    case 'Enter':
                        event.preventDefault();
                        if (activeItem) {
                            activeItem.click();
                        }
                        break;
                    case 'Escape':
                        this.hideSearchResults(results);
                        input.blur();
                        break;
                }
            });
        });
    },

    performSearch(container, query) {
        const input = container.querySelector('.componix-search-input');
        const results = container.querySelector('.componix-search-results');
        const searchUrl = input.dataset.searchUrl;

        if (!searchUrl || !results) return;

        // Show loading state
        this.showSearchLoading(results);

        // Cancel previous request
        if (this.currentRequest) {
            this.currentRequest.abort();
        }

        // Perform search
        this.currentRequest = fetch(`${searchUrl}?q=${encodeURIComponent(query)}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            this.showSearchResults(results, data.results || []);
        })
        .catch(error => {
            if (error.name !== 'AbortError') {
                console.error('Search error:', error);
                this.hideSearchResults(results);
            }
        });
    },

    showSearchLoading(results) {
        if (!results) return;

        results.innerHTML = `
            <div class="componix-search-loading">
                <svg class="componix-search-spinner" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        `;
        results.classList.remove('hidden');
    },

    showSearchResults(results, items) {
        if (!results) return;

        if (items.length === 0) {
            results.innerHTML = '<div class="componix-search-no-results">No results found</div>';
        } else {
            results.innerHTML = items.map((item, index) => `
                <div class="componix-search-result-item ${index === 0 ? 'componix-search-result-item-active' : ''}" 
                     data-value="${item.value || ''}" 
                     data-url="${item.url || ''}">
                    ${item.title || item.label || item.text || item}
                </div>
            `).join('');

            // Add click handlers
            results.querySelectorAll('.componix-search-result-item').forEach(item => {
                item.addEventListener('click', () => {
                    const url = item.dataset.url;
                    const value = item.dataset.value;

                    if (url) {
                        window.location.href = url;
                    } else if (value) {
                        const input = results.closest('.componix-search').querySelector('.componix-search-input');
                        if (input) {
                            input.value = value;
                            this.hideSearchResults(results);
                        }
                    }
                });
            });
        }

        results.classList.remove('hidden');
    },

    hideSearchResults(results) {
        if (results) {
            results.classList.add('hidden');
        }
    },

    setActiveSearchItem(items, activeIndex) {
        items.forEach((item, index) => {
            item.classList.toggle('componix-search-result-item-active', index === activeIndex);
        });
    },

    // Button functionality
    initButtons() {
        document.querySelectorAll('[data-loading]').forEach(button => {
            button.addEventListener('click', () => {
                this.setButtonLoading(button, true);
            });
        });
    },

    setButtonLoading(button, loading = true) {
        if (loading) {
            button.disabled = true;
            button.classList.add('componix-button-loading');
            
            const originalText = button.textContent;
            button.dataset.originalText = originalText;
            
            const loadingText = button.dataset.loadingText || 'Loading...';
            button.innerHTML = `
                <svg class="componix-button-spinner" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                ${loadingText}
            `;
        } else {
            button.disabled = false;
            button.classList.remove('componix-button-loading');
            button.textContent = button.dataset.originalText || button.textContent;
        }
    },

    // Utility functions
    utils: {
        // Debounce function
        debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        // Throttle function
        throttle(func, limit) {
            let inThrottle;
            return function() {
                const args = arguments;
                const context = this;
                if (!inThrottle) {
                    func.apply(context, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            };
        },

        // Check if element is in viewport
        isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        },

        // Animate element
        animate(element, animation, duration = 300) {
            return new Promise((resolve) => {
                element.style.transition = `all ${duration}ms ease-in-out`;
                
                switch (animation) {
                    case 'fadeIn':
                        element.style.opacity = '0';
                        element.style.display = 'block';
                        setTimeout(() => element.style.opacity = '1', 10);
                        break;
                    case 'fadeOut':
                        element.style.opacity = '0';
                        break;
                    case 'slideUp':
                        element.style.transform = 'translateY(100%)';
                        setTimeout(() => element.style.transform = 'translateY(0)', 10);
                        break;
                    case 'slideDown':
                        element.style.transform = 'translateY(0)';
                        setTimeout(() => element.style.transform = 'translateY(100%)', 10);
                        break;
                }

                setTimeout(() => {
                    element.style.transition = '';
                    if (animation === 'fadeOut' || animation === 'slideDown') {
                        element.style.display = 'none';
                    }
                    resolve();
                }, duration);
            });
        }
    }
};

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        if (window.Componix.config.autoInit) {
            window.Componix.init();
        }
    });
} else {
    if (window.Componix.config.autoInit) {
        window.Componix.init();
    }
}

// Re-initialize after Livewire updates
document.addEventListener('livewire:load', () => {
    window.Componix.init();
});

document.addEventListener('livewire:update', () => {
    window.Componix.init();
});

// Export for module systems
if (typeof module !== 'undefined' && module.exports) {
    module.exports = window.Componix;
}
