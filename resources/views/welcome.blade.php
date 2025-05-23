<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componix - Laravel Livewire Components</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    @livewire('componix-navbar')

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Welcome to Componix
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100">
                    Beautiful, reusable Laravel Livewire components with Tailwind CSS
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-componix-button variant="light" size="lg" href="#components">
                        Explore Components
                    </x-componix-button>
                    <x-componix-button variant="outline-primary" size="lg" href="#documentation">
                        Documentation
                    </x-componix-button>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Why Choose Componix?
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Build modern web applications faster with our collection of pre-built, customizable components.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <x-componix-card hover="true" class="text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Lightning Fast</h3>
                    <p class="text-gray-600">Built with Livewire for reactive components without the complexity of JavaScript frameworks.</p>
                </x-componix-card>

                <x-componix-card hover="true" class="text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17v4a2 2 0 002 2h4M13 13h4a2 2 0 012 2v4a2 2 0 01-2 2h-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fully Customizable</h3>
                    <p class="text-gray-600">Every component is built with Tailwind CSS and can be easily customized to match your design.</p>
                </x-componix-card>

                <x-componix-card hover="true" class="text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Production Ready</h3>
                    <p class="text-gray-600">All components are thoroughly tested and ready for production use in your Laravel applications.</p>
                </x-componix-card>
            </div>
        </div>
    </div>

    <!-- Components Showcase -->
    <div id="components" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Component Showcase
                </h2>
                <p class="text-lg text-gray-600">
                    See our components in action
                </p>
            </div>

            <div class="space-y-16">
                <!-- Alerts Demo -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6">Alerts</h3>
                    <div class="grid gap-4">
                        <x-componix-alert type="success" title="Success!">
                            Your changes have been saved successfully.
                        </x-componix-alert>
                        <x-componix-alert type="error" title="Error!">
                            There was a problem processing your request.
                        </x-componix-alert>
                        <x-componix-alert type="warning" title="Warning!">
                            Please review your input before continuing.
                        </x-componix-alert>
                        <x-componix-alert type="info" title="Info">
                            This is some helpful information for you.
                        </x-componix-alert>
                    </div>
                </div>

                <!-- Buttons Demo -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6">Buttons</h3>
                    <div class="flex flex-wrap gap-4">
                        <x-componix-button variant="primary">Primary</x-componix-button>
                        <x-componix-button variant="secondary">Secondary</x-componix-button>
                        <x-componix-button variant="success">Success</x-componix-button>
                        <x-componix-button variant="danger">Danger</x-componix-button>
                        <x-componix-button variant="outline-primary">Outline</x-componix-button>
                        <x-componix-button variant="ghost">Ghost</x-componix-button>
                        <x-componix-button icon="plus">With Icon</x-componix-button>
                        <x-componix-button loading="true">Loading</x-componix-button>
                    </div>
                </div>

                <!-- Search Demo -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6">Live Search</h3>
                    <div class="max-w-md">
                        @livewire('componix-live-search')
                    </div>
                </div>

                <!-- Modal Demo -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6">Modal</h3>
                    <div class="space-y-4">
                        <x-componix-button 
                            x-data 
                            @click="$dispatch('openModal', { title: 'Example Modal', content: 'This is a dynamic modal component with Livewire and Alpine.js integration.' })">
                            Open Modal
                        </x-componix-button>
                        @livewire('componix-modal')
                    </div>
                </div>

                <!-- Cards Demo -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6">Cards</h3>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <x-componix-card title="Simple Card" subtitle="Basic card example">
                            This is a simple card component with title, subtitle, and content.
                        </x-componix-card>
                        
                        <x-componix-card hover="true">
                            <h4 class="font-semibold mb-2">Hover Effect</h4>
                            <p>This card has a hover effect that lifts it slightly when you hover over it.</p>
                        </x-componix-card>
                        
                        <x-componix-card title="Action Card" subtitle="With button">
                            <p class="mb-4">Cards can contain any content including buttons and other components.</p>
                            <x-componix-button size="sm">Learn More</x-componix-button>
                        </x-componix-card>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Installation Section -->
    <div id="documentation" class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Quick Start
                </h2>
                <p class="text-lg text-gray-600">
                    Get started with Componix in minutes
                </p>
            </div>

            <div class="space-y-8">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4">1. Install via Composer</h3>
                    <div class="bg-gray-900 text-green-400 p-4 rounded font-mono text-sm">
                        composer require componix/componix
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4">2. Publish Assets</h3>
                    <div class="bg-gray-900 text-green-400 p-4 rounded font-mono text-sm">
                        php artisan vendor:publish --tag=componix-views<br>
                        php artisan vendor:publish --tag=componix-config
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4">3. Use Components</h3>
                    <div class="bg-gray-900 text-green-400 p-4 rounded font-mono text-sm">
                        &lt;x-componix-button variant="primary"&gt;Click me&lt;/x-componix-button&gt;<br>
                        @livewire('componix-navbar')<br>
                        @livewire('componix-live-search')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">Componix</h3>
                <p class="text-gray-400 mb-6">
                    Beautiful Laravel Livewire components for modern web applications
                </p>
                <div class="flex justify-center space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Documentation</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">GitHub</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Support</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
