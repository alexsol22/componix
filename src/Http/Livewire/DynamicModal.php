<?php

namespace Componix\Componix\Http\Livewire;

use Livewire\Component;

class DynamicModal extends Component
{
    public $show = false;
    public $title = '';
    public $content = '';
    public $size = 'md';
    public $backdropBlur = true;
    public $closeOnBackdropClick = true;
    public $closeOnEscape = true;
    public $animation = 'fade';
    public $showHeader = true;
    public $showFooter = false;
    public $footerButtons = [];

    protected $listeners = [
        'openModal' => 'open',
        'closeModal' => 'close',
        'setModalContent' => 'setContent',
    ];

    public function mount(
        $title = '',
        $content = '',
        $size = null,
        $backdropBlur = null,
        $closeOnBackdropClick = null,
        $closeOnEscape = null,
        $animation = null,
        $showHeader = true,
        $showFooter = false,
        $footerButtons = []
    ) {
        $this->title = $title;
        $this->content = $content;
        $this->size = $size ?? config('componix.modal.max_width', 'md');
        $this->backdropBlur = $backdropBlur ?? config('componix.modal.backdrop_blur', true);
        $this->closeOnBackdropClick = $closeOnBackdropClick ?? config('componix.modal.close_on_backdrop_click', true);
        $this->closeOnEscape = $closeOnEscape ?? config('componix.modal.close_on_escape', true);
        $this->animation = $animation ?? config('componix.modal.animation', 'fade');
        $this->showHeader = $showHeader;
        $this->showFooter = $showFooter;
        $this->footerButtons = $footerButtons;
    }

    public function open($title = null, $content = null, $options = [])
    {
        if ($title) $this->title = $title;
        if ($content) $this->content = $content;
        
        if (isset($options['size'])) $this->size = $options['size'];
        if (isset($options['showHeader'])) $this->showHeader = $options['showHeader'];
        if (isset($options['showFooter'])) $this->showFooter = $options['showFooter'];
        if (isset($options['footerButtons'])) $this->footerButtons = $options['footerButtons'];
        
        $this->show = true;
        $this->dispatch('modal-opened');
    }

    public function close()
    {
        $this->show = false;
        $this->dispatch('modal-closed');
    }

    public function setContent($title, $content, $options = [])
    {
        $this->title = $title;
        $this->content = $content;
        
        if (isset($options['size'])) $this->size = $options['size'];
        if (isset($options['showHeader'])) $this->showHeader = $options['showHeader'];
        if (isset($options['showFooter'])) $this->showFooter = $options['showFooter'];
        if (isset($options['footerButtons'])) $this->footerButtons = $options['footerButtons'];
    }

    public function backdropClick()
    {
        if ($this->closeOnBackdropClick) {
            $this->close();
        }
    }

    public function handleEscape()
    {
        if ($this->closeOnEscape) {
            $this->close();
        }
    }

    public function getSizeClasses()
    {
        return match($this->size) {
            'sm' => 'max-w-sm',
            'md' => 'max-w-md',
            'lg' => 'max-w-lg',
            'xl' => 'max-w-xl',
            '2xl' => 'max-w-2xl',
            '3xl' => 'max-w-3xl',
            '4xl' => 'max-w-4xl',
            '5xl' => 'max-w-5xl',
            '6xl' => 'max-w-6xl',
            'full' => 'max-w-full',
            default => 'max-w-md',
        };
    }

    public function render()
    {
        return view('componix::livewire.dynamic-modal');
    }
}
