<?php

namespace Componix\Componix;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Componix\Componix\Http\Livewire\DynamicNavbar;
use Componix\Componix\Http\Livewire\DynamicModal;
use Componix\Componix\Http\Livewire\LiveSearch;

class ComponixServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/componix.php', 'componix');
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/componix.php' => config_path('componix.php'),
        ], 'componix-config');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/componix'),
        ], 'componix-views');

        // Publish assets
        $this->publishes([
            __DIR__.'/../resources/css' => resource_path('css/vendor/componix'),
            __DIR__.'/../resources/js' => resource_path('js/vendor/componix'),
        ], 'componix-assets');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'componix');

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Register Livewire components
        Livewire::component('componix-navbar', DynamicNavbar::class);
        Livewire::component('componix-modal', DynamicModal::class);
        Livewire::component('componix-live-search', LiveSearch::class);

        // Register Blade components
        $this->loadViewComponentsAs('componix', [
            'button' => \Componix\Componix\View\Components\Button::class,
            'card' => \Componix\Componix\View\Components\Card::class,
            'alert' => \Componix\Componix\View\Components\Alert::class,
        ]);
    }
}
