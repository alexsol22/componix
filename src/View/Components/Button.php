<?php

namespace Componix\Componix\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $variant;
    public $size;
    public $type;
    public $disabled;
    public $loading;
    public $loadingText;
    public $icon;
    public $iconPosition;
    public $href;
    public $target;

    public function __construct(
        $variant = null,
        $size = null,
        $type = 'button',
        $disabled = false,
        $loading = false,
        $loadingText = null,
        $icon = null,
        $iconPosition = 'left',
        $href = null,
        $target = null
    ) {
        $this->variant = $variant ?? config('componix.button.default_variant', 'primary');
        $this->size = $size ?? config('componix.button.default_size', 'md');
        $this->type = $type;
        $this->disabled = $disabled;
        $this->loading = $loading;
        $this->loadingText = $loadingText ?? config('componix.button.loading_text', 'Loading...');
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->href = $href;
        $this->target = $target;
    }

    public function getVariantClasses()
    {
        return match($this->variant) {
            'primary' => 'bg-blue-600 hover:bg-blue-700 text-white border-transparent',
            'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white border-transparent',
            'success' => 'bg-green-600 hover:bg-green-700 text-white border-transparent',
            'danger' => 'bg-red-600 hover:bg-red-700 text-white border-transparent',
            'warning' => 'bg-yellow-600 hover:bg-yellow-700 text-white border-transparent',
            'info' => 'bg-cyan-600 hover:bg-cyan-700 text-white border-transparent',
            'light' => 'bg-gray-100 hover:bg-gray-200 text-gray-900 border-gray-300',
            'dark' => 'bg-gray-800 hover:bg-gray-900 text-white border-transparent',
            'outline-primary' => 'bg-transparent hover:bg-blue-600 text-blue-600 hover:text-white border-blue-600',
            'outline-secondary' => 'bg-transparent hover:bg-gray-600 text-gray-600 hover:text-white border-gray-600',
            'outline-success' => 'bg-transparent hover:bg-green-600 text-green-600 hover:text-white border-green-600',
            'outline-danger' => 'bg-transparent hover:bg-red-600 text-red-600 hover:text-white border-red-600',
            'ghost' => 'bg-transparent hover:bg-gray-100 text-gray-700 border-transparent',
            default => 'bg-blue-600 hover:bg-blue-700 text-white border-transparent',
        };
    }

    public function getSizeClasses()
    {
        return match($this->size) {
            'xs' => 'px-2 py-1 text-xs',
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-sm',
            'lg' => 'px-6 py-3 text-base',
            'xl' => 'px-8 py-4 text-lg',
            default => 'px-4 py-2 text-sm',
        };
    }

    public function getBaseClasses()
    {
        return 'inline-flex items-center justify-center font-medium rounded-md border transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed';
    }

    public function getAllClasses()
    {
        return implode(' ', [
            $this->getBaseClasses(),
            $this->getVariantClasses(),
            $this->getSizeClasses(),
        ]);
    }

    public function render()
    {
        return view('componix::components.button');
    }
}
