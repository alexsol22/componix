<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componix Demo - Beautiful Laravel Livewire Components</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="{{ asset('vendor/componix/css/componix.css') }}" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    @livewire('componix-navbar', [
        'brand' => 'Componix Demo',
        'brandUrl' => '/componix',
        'menuItems' => [
            ['label' => 'Components', 'url' => '#components', 'active' => true],
            ['label' => 'Documentation', 'url' => '#docs', 'active' => false],
            [
                'label' => 'Examples',
                'active' => false,
                'children' => [
                    ['label' => 'Buttons', 'url' => '#buttons'],
                    ['label' => 'Cards', 'url' => '#cards'],
                    ['label' => 'Alerts', 'url' => '#alerts'],
                    ['label' => 'Modals', 'url' => '#modals'],
                ]
            ],
        ]
    ])

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Beautiful Laravel Livewire Components
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100">
                    A comprehensive collection of reusable components with Tailwind CSS styling
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-componix-button 
                        variant="light" 
                        size="lg" 
                        href="#components">
                        View Components
                    </x-componix-button>
                    <x-componix-button 
                        variant="outline-primary" 
                        size="lg" 
                        href="https://github.com/alexsol22/componix"
                        target="_blank">
                        GitHub
                    </x-componix-button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Buttons Section -->
        <section id="buttons" class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Buttons</h2>
            
            <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                <h3 class="text-xl font-semibold mb-6">Button Variants</h3>
                <div class="flex flex-wrap gap-4 mb-6">
                    <x-componix-button variant="primary">Primary</x-componix-button>
                    <x-componix-button variant="secondary">Secondary</x-componix-button>
                    <x-componix-button variant="success">Success</x-componix-button>
                    <x-componix-button variant="danger">Danger</x-componix-button>
                    <x-componix-button variant="warning">Warning</x-componix-button>
                    <x-componix-button variant="info">Info</x-componix-button>
                    <x-componix-button variant="light">Light</x-componix-button>
                    <x-componix-button variant="dark">Dark</x-componix-button>
                </div>
                
                <h3 class="text-xl font-semibold mb-6">Outline Variants</h3>
                <div class="flex flex-wrap gap-4 mb-6">
                    <x-componix-button variant="outline-primary">Outline Primary</x-componix-button>
                    <x-componix-button variant="outline-secondary">Outline Secondary</x-componix-button>
                    <x-componix-button variant="outline-success">Outline Success</x-componix-button>
                    <x-componix-button variant="outline-danger">Outline Danger</x-componix-button>
                    <x-componix-button variant="ghost">Ghost</x-componix-button>
                </div>

                <h3 class="text-xl font-semibold mb-6">Button Sizes</h3>
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <x-componix-button size="xs">Extra Small</x-componix-button>
                    <x-componix-button size="sm">Small</x-componix-button>
                    <x-componix-button size="md">Medium</x-componix-button>
                    <x-componix-button size="lg">Large</x-componix-button>
                    <x-componix-button size="xl">Extra Large</x-componix-button>
                </div>

                <h3 class="text-xl font-semibold mb-6">Button States</h3>
                <div class="flex flex-wrap gap-4">
                    <x-componix-button loading="true">Loading</x-componix-button>
                    <x-componix-button disabled="true">Disabled</x-componix-button>
                    <x-componix-button 
                        x-data 
                        @click="$dispatch('openModal', { 
                            title: 'Button Modal', 
                            content: 'This modal was opened by clicking a button!',
                            size: 'md'
                        })">
                        Open Modal
                    </x-componix-button>
                </div>
            </div>
        </section>

        <!-- Cards Section -->
        <section id="cards" class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Cards</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-componix-card title="Basic Card" subtitle="Simple card example">
                    This is a basic card component with title, subtitle, and content.
                </x-componix-card>

                <x-componix-card 
                    title="Hoverable Card" 
                    subtitle="Hover effect enabled"
                    hover="true">
                    This card has a hover effect that lifts it slightly when you hover over it.
                </x-componix-card>

                <x-componix-card 
                    title="Card with Image" 
                    subtitle="Image at the top"
                    image="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                    image-position="top">
                    This card includes an image at the top with proper aspect ratio handling.
                </x-componix-card>

                <x-componix-card title="Product Card" subtitle="$99.99">
                    <div class="space-y-4">
                        <p class="text-gray-600">A beautiful product with amazing features and great value.</p>
                        <div class="flex gap-2">
                            <x-componix-button variant="primary" size="sm">Buy Now</x-componix-button>
                            <x-componix-button variant="outline-primary" size="sm">Add to Cart</x-componix-button>
                        </div>
                    </div>
                </x-componix-card>

                <x-componix-card title="Feature Card" subtitle="Premium Feature">
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Feature one included</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Feature two included</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Feature three included</span>
                        </div>
                    </div>
                </x-componix-card>

                <x-componix-card title="Stats Card" subtitle="Performance Metrics">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">1,234</div>
                            <div class="text-sm text-gray-500">Users</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">98%</div>
                            <div class="text-sm text-gray-500">Uptime</div>
                        </div>
                    </div>
                </x-componix-card>
            </div>
        </section>

        <!-- Alerts Section -->
        <section id="alerts" class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Alerts</h2>
            
            <div class="space-y-4">
                <x-componix-alert type="success" title="Success!">
                    Your operation completed successfully.
                </x-componix-alert>

                <x-componix-alert type="error" title="Error!">
                    Something went wrong. Please try again.
                </x-componix-alert>

                <x-componix-alert type="warning" title="Warning!">
                    Please review your input before proceeding.
                </x-componix-alert>

                <x-componix-alert type="info" title="Information">
                    Here's some helpful information for you.
                </x-componix-alert>

                <x-componix-alert type="success">
                    Simple success alert without title.
                </x-componix-alert>

                <x-componix-alert type="info" :dismissible="false">
                    This alert cannot be dismissed by the user.
                </x-componix-alert>
            </div>
        </section>

        <!-- Search Section -->
        <section id="search" class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Live Search</h2>
            
            <div class="bg-white rounded-lg shadow-md p-8">
                <h3 class="text-xl font-semibold mb-6">Search Component</h3>
                <div class="max-w-md">
                    @livewire('componix-live-search', [
                        'placeholder' => 'Search for anything...',
                        'searchUrl' => '/api/search',
                        'minCharacters' => 2,
                        'maxResults' => 10
                    ])
                </div>
                <p class="text-sm text-gray-600 mt-4">
                    Start typing to see live search results. This component supports debouncing, 
                    keyboard navigation, and customizable result formatting.
                </p>
            </div>
        </section>

        <!-- Modal Section -->
        <section id="modals" class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Modals</h2>
            
            <div class="bg-white rounded-lg shadow-md p-8">
                <h3 class="text-xl font-semibold mb-6">Modal Examples</h3>
                <div class="flex flex-wrap gap-4">
                    <x-componix-button 
                        x-data 
                        @click="$dispatch('openModal', { 
                            title: 'Small Modal', 
                            content: 'This is a small modal example.',
                            size: 'sm'
                        })">
                        Small Modal
                    </x-componix-button>

                    <x-componix-button 
                        variant="secondary"
                        x-data 
                        @click="$dispatch('openModal', { 
                            title: 'Medium Modal', 
                            content: 'This is a medium-sized modal with more content space.',
                            size: 'md'
                        })">
                        Medium Modal
                    </x-componix-button>

                    <x-componix-button 
                        variant="success"
                        x-data 
                        @click="$dispatch('openModal', { 
                            title: 'Large Modal', 
                            content: 'This is a large modal that provides plenty of space for complex content and forms.',
                            size: 'lg'
                        })">
                        Large Modal
                    </x-componix-button>

                    <x-componix-button 
                        variant="info"
                        x-data 
                        @click="$dispatch('openModal', { 
                            title: 'Extra Large Modal', 
                            content: 'This is an extra large modal perfect for detailed forms, tables, or rich content.',
                            size: 'xl'
                        })">
                        Extra Large Modal
                    </x-componix-button>
                </div>
                <p class="text-sm text-gray-600 mt-4">
                    Modals support backdrop blur, escape key closing, backdrop click closing, 
                    and multiple size options. They integrate seamlessly with Alpine.js and Livewire.
                </p>
            </div>
        </section>

        <!-- Installation Section -->
        <section id="installation" class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Installation</h2>
            
            <div class="bg-white rounded-lg shadow-md p-8">
                <h3 class="text-xl font-semibold mb-6">Quick Start</h3>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-medium mb-2">1. Install via Composer</h4>
                        <div class="bg-gray-100 rounded-md p-4 font-mono text-sm">
                            composer require alexsol22/componix
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium mb-2">2. Publish Configuration</h4>
                        <div class="bg-gray-100 rounded-md p-4 font-mono text-sm">
                            php artisan vendor:publish --tag=componix-config
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium mb-2">3. Publish Views (Optional)</h4>
                        <div class="bg-gray-100 rounded-md p-4 font-mono text-sm">
                            php artisan vendor:publish --tag=componix-views
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium mb-2">4. Publish Assets (Optional)</h4>
                        <div class="bg-gray-100 rounded-md p-4 font-mono text-sm">
                            php artisan vendor:publish --tag=componix-assets
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">Componix</h3>
                <p class="text-gray-300 mb-6">
                    Beautiful Laravel Livewire components for modern web applications
                </p>
                <div class="flex justify-center space-x-6">
                    <a href="https://github.com/alexsol22/componix" class="text-gray-300 hover:text-white transition-colors">
                        GitHub
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">
                        Documentation
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors">
                        Support
                    </a>
                </div>
                <div class="mt-8 pt-8 border-t border-gray-700 text-sm text-gray-400">
                    © 2024 Componix. Released under the MIT License.
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Component -->
    @livewire('componix-modal')

    <!-- Scripts -->
    <script src="{{ asset('vendor/componix/js/componix.js') }}"></script>
    @livewireScripts
</body>
</html>
