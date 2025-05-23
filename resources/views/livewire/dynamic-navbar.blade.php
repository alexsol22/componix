<nav class="{{ $sticky ? 'sticky top-0 z-50' : '' }} {{ $background }} {{ $textColor }} {{ $shadow ? 'shadow-lg' : '' }} transition-all duration-200"
     x-data="{ mobileMenuOpen: @entangle('showMobileMenu') }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Brand/Logo -->
            <div class="flex items-center">
                <a href="{{ $brandUrl }}" class="flex-shrink-0 flex items-center">
                    <span class="text-xl font-bold">{{ $brand }}</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden {{ $mobileBreakpoint }}:flex {{ $mobileBreakpoint }}:items-center {{ $mobileBreakpoint }}:space-x-8">
                @foreach($menuItems as $item)
                    @if(isset($item['children']))
                        <!-- Dropdown Menu -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-100 transition-colors duration-200">
                                {{ $item['label'] }}
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                @foreach($item['children'] as $child)
                                    <a href="{{ $child['url'] }}" 
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <!-- Regular Menu Item -->
                        <a href="{{ $item['url'] }}" 
                           class="px-3 py-2 text-sm font-medium rounded-md {{ $item['active'] ?? false ? 'bg-gray-100' : '' }} hover:bg-gray-100 transition-colors duration-200">
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Mobile menu button -->
            <div class="{{ $mobileBreakpoint }}:hidden flex items-center">
                <button wire:click="toggleMobileMenu" 
                        class="inline-flex items-center justify-center p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="{{ $mobileBreakpoint }}:hidden bg-white border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach($menuItems as $item)
                @if(isset($item['children']))
                    <!-- Mobile Dropdown -->
                    <div x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="w-full text-left flex items-center justify-between px-3 py-2 text-base font-medium rounded-md hover:bg-gray-100">
                            {{ $item['label'] }}
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="pl-4">
                            @foreach($item['children'] as $child)
                                <a href="{{ $child['url'] }}" 
                                   wire:click="closeMobileMenu"
                                   class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-md">
                                    {{ $child['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Mobile Menu Item -->
                    <a href="{{ $item['url'] }}" 
                       wire:click="closeMobileMenu"
                       class="block px-3 py-2 text-base font-medium rounded-md {{ $item['active'] ?? false ? 'bg-gray-100' : '' }} hover:bg-gray-100">
                        {{ $item['label'] }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</nav>
