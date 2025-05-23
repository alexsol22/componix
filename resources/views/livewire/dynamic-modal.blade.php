<div x-data="{ 
        show: @entangle('show'),
        closeOnEscape: {{ $closeOnEscape ? 'true' : 'false' }}
     }"
     x-show="show"
     x-on:keydown.escape.window="closeOnEscape && $wire.close()"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">
    
    <!-- Backdrop -->
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" 
             @if($closeOnBackdropClick) wire:click="backdropClick" @endif>
            <div class="absolute inset-0 bg-gray-500 opacity-75 {{ $backdropBlur ? 'backdrop-blur-sm' : '' }}"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!-- Modal panel -->
        <div x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle {{ $getSizeClasses() }} sm:w-full">
            
            @if($showHeader && ($title || $slot->isNotEmpty()))
                <!-- Header -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        @if($title)
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ $title }}
                            </h3>
                        @endif
                        
                        <button wire:click="close" 
                                class="rounded-md text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Content -->
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                @if($content)
                    <div class="prose max-w-none">
                        {!! $content !!}
                    </div>
                @endif
                
                {{ $slot }}
            </div>

            @if($showFooter && count($footerButtons) > 0)
                <!-- Footer -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    @foreach($footerButtons as $button)
                        <button type="button"
                                @if(isset($button['action'])) wire:click="{{ $button['action'] }}" @endif
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm
                                       @if(($button['variant'] ?? 'primary') === 'primary') bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500
                                       @elseif(($button['variant'] ?? 'primary') === 'secondary') bg-white text-gray-700 border-gray-300 hover:bg-gray-50 focus:ring-blue-500
                                       @elseif(($button['variant'] ?? 'primary') === 'danger') bg-red-600 text-white hover:bg-red-700 focus:ring-red-500
                                       @endif">
                            {{ $button['label'] ?? 'Button' }}
                        </button>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
