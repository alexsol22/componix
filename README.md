# Componix

A beautiful collection of reusable Laravel Livewire components with Tailwind CSS styling.

## Features

- 🚀 **Dynamic Navbar** - Responsive navigation with dropdown support
- 🎯 **Dynamic Modal** - Flexible modal component with Alpine.js integration
- 🔍 **Live Search** - Real-time search with debouncing and type filtering
- 🎨 **Button Component** - Multiple variants, sizes, and states
- 📦 **Card Component** - Flexible card layouts with image support
- ⚠️ **Alert Component** - Dismissible alerts with auto-dismiss functionality

## Requirements

- PHP 8.1+
- Laravel 10.0+ or 11.0+
- Livewire 3.0+
- Tailwind CSS
- Alpine.js

## Installation

1. Install the package via Composer:

```bash
composer require axesol22/componix
```

2. Publish the configuration file:

```bash
php artisan vendor:publish --tag=componix-config
```

3. Publish the views (optional, for customization):

```bash
php artisan vendor:publish --tag=componix-views
```

4. Publish the assets (optional):

```bash
php artisan vendor:publish --tag=componix-assets
```

## Usage

### Livewire Components

#### Dynamic Navbar

```blade
@livewire('componix-navbar')

<!-- With custom menu items -->
@livewire('componix-navbar', [
    'brand' => 'My App',
    'brandUrl' => '/',
    'menuItems' => [
        ['label' => 'Home', 'url' => '/', 'active' => true],
        ['label' => 'About', 'url' => '/about', 'active' => false],
        [
            'label' => 'Services',
            'active' => false,
            'children' => [
                ['label' => 'Web Design', 'url' => '/services/web-design'],
                ['label' => 'Development', 'url' => '/services/development'],
            ]
        ],
    ]
])
```

#### Dynamic Modal

```blade
@livewire('componix-modal')

<!-- Trigger modal with Alpine.js -->
<x-componix-button 
    x-data 
    @click="$dispatch('openModal', { 
        title: 'My Modal', 
        content: 'Modal content here',
        size: 'lg'
    })">
    Open Modal
</x-componix-button>
```

#### Live Search

```blade
@livewire('componix-live-search')

<!-- With custom configuration -->
@livewire('componix-live-search', [
    'placeholder' => 'Search products...',
    'searchUrl' => '/api/products/search',
    'minCharacters' => 3,
    'maxResults' => 15
])
```

### Blade Components

#### Buttons

```blade
<!-- Basic button -->
<x-componix-button>Click me</x-componix-button>

<!-- Button variants -->
<x-componix-button variant="primary">Primary</x-componix-button>
<x-componix-button variant="secondary">Secondary</x-componix-button>
<x-componix-button variant="success">Success</x-componix-button>
<x-componix-button variant="danger">Danger</x-componix-button>
<x-componix-button variant="outline-primary">Outline</x-componix-button>

<!-- Button sizes -->
<x-componix-button size="xs">Extra Small</x-componix-button>
<x-componix-button size="sm">Small</x-componix-button>
<x-componix-button size="md">Medium</x-componix-button>
<x-componix-button size="lg">Large</x-componix-button>
<x-componix-button size="xl">Extra Large</x-componix-button>

<!-- Button with icon -->
<x-componix-button icon="plus">Add Item</x-componix-button>
<x-componix-button icon="arrow-right" icon-position="right">Next</x-componix-button>

<!-- Loading state -->
<x-componix-button loading="true">Processing...</x-componix-button>

<!-- As link -->
<x-componix-button href="/dashboard" target="_blank">Go to Dashboard</x-componix-button>
```

#### Cards

```blade
<!-- Basic card -->
<x-componix-card>
    Card content goes here
</x-componix-card>

<!-- Card with title and subtitle -->
<x-componix-card title="Card Title" subtitle="Card subtitle">
    Card content goes here
</x-componix-card>

<!-- Card with image -->
<x-componix-card 
    title="Product Name" 
    image="/path/to/image.jpg" 
    image-position="top">
    Product description here
</x-componix-card>

<!-- Hoverable card -->
<x-componix-card hover="true">
    This card lifts on hover
</x-componix-card>
```

#### Alerts

```blade
<!-- Basic alerts -->
<x-componix-alert type="success">Operation completed successfully!</x-componix-alert>
<x-componix-alert type="error">An error occurred!</x-componix-alert>
<x-componix-alert type="warning">Please be careful!</x-componix-alert>
<x-componix-alert type="info">Here's some information.</x-componix-alert>

<!-- Alert with title -->
<x-componix-alert type="success" title="Success!">
    Your changes have been saved.
</x-componix-alert>

<!-- Non-dismissible alert -->
<x-componix-alert type="info" :dismissible="false">
    This alert cannot be dismissed.
</x-componix-alert>

<!-- Auto-dismiss alert -->
<x-componix-alert type="success" :auto-dismiss="true" :auto-dismiss-delay="3000">
    This alert will disappear after 3 seconds.
</x-componix-alert>
```

## Configuration

The configuration file `config/componix.php` allows you to customize default settings for all components:

```php
return [
    'navbar' => [
        'brand' => 'Componix',
        'brand_url' => '/',
        'sticky' => true,
        'shadow' => true,
        'background' => 'bg-white',
        'text_color' => 'text-gray-900',
    ],
    
    'modal' => [
        'backdrop_blur' => true,
        'close_on_backdrop_click' => true,
        'close_on_escape' => true,
        'max_width' => 'md',
    ],
    
    'search' => [
        'debounce' => 300,
        'min_characters' => 2,
        'max_results' => 10,
        'placeholder' => 'Search...',
    ],
    
    // ... more configuration options
];
```

## Demo

Visit `/componix` in your Laravel application to see all components in action with a beautiful demo page.

## Customization

All components are built with Tailwind CSS and can be easily customized by:

1. Publishing the views and modifying the Blade templates
2. Extending the component classes
3. Overriding the configuration values
4. Adding custom CSS classes via the `class` attribute

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## Support

If you discover any security vulnerabilities or bugs, please send an e-mail to the maintainers.

---

**Componix** - Beautiful Laravel Livewire components for modern web applications.
