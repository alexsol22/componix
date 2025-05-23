<?php

namespace Componix\Componix\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $shadow;
    public $rounded;
    public $padding;
    public $background;
    public $border;
    public $hover;
    public $title;
    public $subtitle;
    public $image;
    public $imageAlt;
    public $imagePosition;

    public function __construct(
        $shadow = null,
        $rounded = null,
        $padding = null,
        $background = null,
        $border = null,
        $hover = false,
        $title = null,
        $subtitle = null,
        $image = null,
        $imageAlt = null,
        $imagePosition = 'top'
    ) {
        $this->shadow = $shadow ?? config('componix.card.shadow', 'shadow-md');
        $this->rounded = $rounded ?? config('componix.card.rounded', 'rounded-lg');
        $this->padding = $padding ?? config('componix.card.padding', 'p-6');
        $this->background = $background ?? config('componix.card.background', 'bg-white');
        $this->border = $border ?? 'border border-gray-200';
        $this->hover = $hover;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->image = $image;
        $this->imageAlt = $imageAlt ?? $title ?? 'Card image';
        $this->imagePosition = $imagePosition;
    }

    public function getCardClasses()
    {
        $classes = [
            $this->background,
            $this->shadow,
            $this->rounded,
            $this->border,
            'overflow-hidden',
            'transition-all duration-200'
        ];

        if ($this->hover) {
            $classes[] = 'hover:shadow-lg hover:-translate-y-1';
        }

        return implode(' ', array_filter($classes));
    }

    public function getContentClasses()
    {
        if ($this->image) {
            return $this->imagePosition === 'top' ? 'p-6' : $this->padding;
        }
        
        return $this->padding;
    }

    public function render()
    {
        return view('componix::components.card');
    }
}
