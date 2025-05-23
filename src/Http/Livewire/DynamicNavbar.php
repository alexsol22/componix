<?php

namespace Componix\Componix\Http\Livewire;

use Livewire\Component;

class DynamicNavbar extends Component
{
    public $brand;
    public $brandUrl;
    public $menuItems = [];
    public $sticky = true;
    public $shadow = true;
    public $background = 'bg-white';
    public $textColor = 'text-gray-900';
    public $mobileBreakpoint = 'md';
    public $showMobileMenu = false;

    public function mount(
        $brand = null,
        $brandUrl = null,
        $menuItems = [],
        $sticky = null,
        $shadow = null,
        $background = null,
        $textColor = null,
        $mobileBreakpoint = null
    ) {
        $this->brand = $brand ?? config('componix.navbar.brand', 'Componix');
        $this->brandUrl = $brandUrl ?? config('componix.navbar.brand_url', '/');
        $this->menuItems = $menuItems ?: $this->getDefaultMenuItems();
        $this->sticky = $sticky ?? config('componix.navbar.sticky', true);
        $this->shadow = $shadow ?? config('componix.navbar.shadow', true);
        $this->background = $background ?? config('componix.navbar.background', 'bg-white');
        $this->textColor = $textColor ?? config('componix.navbar.text_color', 'text-gray-900');
        $this->mobileBreakpoint = $mobileBreakpoint ?? config('componix.navbar.mobile_breakpoint', 'md');
    }

    public function toggleMobileMenu()
    {
        $this->showMobileMenu = !$this->showMobileMenu;
    }

    public function closeMobileMenu()
    {
        $this->showMobileMenu = false;
    }

    protected function getDefaultMenuItems()
    {
        return [
            ['label' => 'Home', 'url' => '/', 'active' => true],
            ['label' => 'Components', 'url' => '/componix/demo/components', 'active' => false],
            ['label' => 'Documentation', 'url' => '#', 'active' => false],
            [
                'label' => 'Examples',
                'active' => false,
                'children' => [
                    ['label' => 'Navbar', 'url' => '/componix/demo/navbar'],
                    ['label' => 'Modal', 'url' => '/componix/demo/modal'],
                    ['label' => 'Search', 'url' => '/componix/demo/search'],
                ]
            ],
        ];
    }

    public function render()
    {
        return view('componix::livewire.dynamic-navbar');
    }
}
