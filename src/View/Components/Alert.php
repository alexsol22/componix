<?php

namespace Componix\Componix\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $dismissible;
    public $autoDismiss;
    public $autoDismissDelay;
    public $showIcon;
    public $title;
    public $icon;

    public function __construct(
        $type = 'info',
        $dismissible = null,
        $autoDismiss = null,
        $autoDismissDelay = null,
        $showIcon = null,
        $title = null,
        $icon = null
    ) {
        $this->type = $type;
        $this->dismissible = $dismissible ?? config('componix.alert.dismissible', true);
        $this->autoDismiss = $autoDismiss ?? config('componix.alert.auto_dismiss', false);
        $this->autoDismissDelay = $autoDismissDelay ?? config('componix.alert.auto_dismiss_delay', 5000);
        $this->showIcon = $showIcon ?? config('componix.alert.show_icon', true);
        $this->title = $title;
        $this->icon = $icon ?? $this->getDefaultIcon();
    }

    public function getTypeClasses()
    {
        return match($this->type) {
            'success' => 'bg-green-50 border-green-200 text-green-800',
            'error' => 'bg-red-50 border-red-200 text-red-800',
            'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
            'info' => 'bg-blue-50 border-blue-200 text-blue-800',
            default => 'bg-blue-50 border-blue-200 text-blue-800',
        };
    }

    public function getIconClasses()
    {
        return match($this->type) {
            'success' => 'text-green-400',
            'error' => 'text-red-400',
            'warning' => 'text-yellow-400',
            'info' => 'text-blue-400',
            default => 'text-blue-400',
        };
    }

    public function getDefaultIcon()
    {
        return match($this->type) {
            'success' => 'check-circle',
            'error' => 'x-circle',
            'warning' => 'exclamation-triangle',
            'info' => 'information-circle',
            default => 'information-circle',
        };
    }

    public function getCloseButtonClasses()
    {
        return match($this->type) {
            'success' => 'text-green-500 hover:text-green-600',
            'error' => 'text-red-500 hover:text-red-600',
            'warning' => 'text-yellow-500 hover:text-yellow-600',
            'info' => 'text-blue-500 hover:text-blue-600',
            default => 'text-blue-500 hover:text-blue-600',
        };
    }

    public function getAllClasses()
    {
        return implode(' ', [
            'border rounded-md p-4',
            $this->getTypeClasses(),
        ]);
    }

    public function render()
    {
        return view('componix::components.alert');
    }
}
