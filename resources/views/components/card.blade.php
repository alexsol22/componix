<div class="{{ $getCardClasses() }}" {{ $attributes }}>
    @if($image)
        @if($imagePosition === 'top')
            <div class="aspect-w-16 aspect-h-9">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" class="w-full h-48 object-cover">
            </div>
        @endif
    @endif

    <div class="{{ $getContentClasses() }}">
        @if($image && $imagePosition === 'left')
            <div class="flex">
                <div class="flex-shrink-0 mr-4">
                    <img src="{{ $image }}" alt="{{ $imageAlt }}" class="w-16 h-16 object-cover rounded">
                </div>
                <div class="flex-1">
        @endif

        @if($title || $subtitle)
            <div class="mb-4">
                @if($title)
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $title }}</h3>
                @endif
                @if($subtitle)
                    <p class="text-sm text-gray-600">{{ $subtitle }}</p>
                @endif
            </div>
        @endif

        <div class="text-gray-700">
            {{ $slot }}
        </div>

        @if($image && $imagePosition === 'left')
                </div>
            </div>
        @endif
    </div>

    @if($image && $imagePosition === 'bottom')
        <div class="aspect-w-16 aspect-h-9">
            <img src="{{ $image }}" alt="{{ $imageAlt }}" class="w-full h-48 object-cover">
        </div>
    @endif
</div>
