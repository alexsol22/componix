<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Theme
    |--------------------------------------------------------------------------
    |
    | This option controls the default theme for Componix components.
    | You can change this to customize the appearance of all components.
    |
    */
    'theme' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Navbar Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration options for the dynamic navbar component.
    |
    */
    'navbar' => [
        'brand' => 'Componix',
        'brand_url' => '/',
        'sticky' => true,
        'shadow' => true,
        'background' => 'bg-white',
        'text_color' => 'text-gray-900',
        'mobile_breakpoint' => 'md',
    ],

    /*
    |--------------------------------------------------------------------------
    | Modal Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration options for the dynamic modal component.
    |
    */
    'modal' => [
        'backdrop_blur' => true,
        'close_on_backdrop_click' => true,
        'close_on_escape' => true,
        'animation' => 'fade',
        'max_width' => 'md',
    ],

    /*
    |--------------------------------------------------------------------------
    | Search Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration options for the live search component.
    |
    */
    'search' => [
        'debounce' => 300,
        'min_characters' => 2,
        'max_results' => 10,
        'placeholder' => 'Search...',
        'no_results_text' => 'No results found.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Button Configuration
    |--------------------------------------------------------------------------
    |
    | Default configuration for button components.
    |
    */
    'button' => [
        'default_variant' => 'primary',
        'default_size' => 'md',
        'loading_text' => 'Loading...',
    ],

    /*
    |--------------------------------------------------------------------------
    | Card Configuration
    |--------------------------------------------------------------------------
    |
    | Default configuration for card components.
    |
    */
    'card' => [
        'shadow' => 'shadow-md',
        'rounded' => 'rounded-lg',
        'padding' => 'p-6',
        'background' => 'bg-white',
    ],

    /*
    |--------------------------------------------------------------------------
    | Alert Configuration
    |--------------------------------------------------------------------------
    |
    | Default configuration for alert components.
    |
    */
    'alert' => [
        'dismissible' => true,
        'auto_dismiss' => false,
        'auto_dismiss_delay' => 5000,
        'show_icon' => true,
    ],
];
