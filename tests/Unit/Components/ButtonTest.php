<?php

namespace Componix\Componix\Tests\Unit\Components;

use Componix\Componix\Tests\TestCase;
use Componix\Componix\View\Components\Button;

class ButtonTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated()
    {
        $button = new Button();
        
        $this->assertInstanceOf(Button::class, $button);
        $this->assertEquals('primary', $button->variant);
        $this->assertEquals('md', $button->size);
        $this->assertEquals('button', $button->type);
        $this->assertFalse($button->disabled);
        $this->assertFalse($button->loading);
    }

    /** @test */
    public function it_accepts_custom_parameters()
    {
        $button = new Button(
            variant: 'secondary',
            size: 'lg',
            type: 'submit',
            disabled: true,
            loading: true,
            loadingText: 'Processing...',
            icon: 'plus',
            iconPosition: 'right',
            href: '/test',
            target: '_blank'
        );

        $this->assertEquals('secondary', $button->variant);
        $this->assertEquals('lg', $button->size);
        $this->assertEquals('submit', $button->type);
        $this->assertTrue($button->disabled);
        $this->assertTrue($button->loading);
        $this->assertEquals('Processing...', $button->loadingText);
        $this->assertEquals('plus', $button->icon);
        $this->assertEquals('right', $button->iconPosition);
        $this->assertEquals('/test', $button->href);
        $this->assertEquals('_blank', $button->target);
    }

    /** @test */
    public function it_returns_correct_variant_classes()
    {
        $button = new Button(variant: 'primary');
        $this->assertStringContainsString('bg-blue-600', $button->getVariantClasses());

        $button = new Button(variant: 'danger');
        $this->assertStringContainsString('bg-red-600', $button->getVariantClasses());

        $button = new Button(variant: 'outline-primary');
        $this->assertStringContainsString('border-blue-600', $button->getVariantClasses());
    }

    /** @test */
    public function it_returns_correct_size_classes()
    {
        $button = new Button(size: 'xs');
        $this->assertStringContainsString('px-2 py-1 text-xs', $button->getSizeClasses());

        $button = new Button(size: 'lg');
        $this->assertStringContainsString('px-6 py-3 text-base', $button->getSizeClasses());

        $button = new Button(size: 'xl');
        $this->assertStringContainsString('px-8 py-4 text-lg', $button->getSizeClasses());
    }

    /** @test */
    public function it_returns_base_classes()
    {
        $button = new Button();
        $baseClasses = $button->getBaseClasses();
        
        $this->assertStringContainsString('inline-flex', $baseClasses);
        $this->assertStringContainsString('items-center', $baseClasses);
        $this->assertStringContainsString('justify-center', $baseClasses);
        $this->assertStringContainsString('font-medium', $baseClasses);
        $this->assertStringContainsString('rounded-md', $baseClasses);
    }

    /** @test */
    public function it_combines_all_classes_correctly()
    {
        $button = new Button(variant: 'primary', size: 'md');
        $allClasses = $button->getAllClasses();
        
        $this->assertStringContainsString('inline-flex', $allClasses);
        $this->assertStringContainsString('bg-blue-600', $allClasses);
        $this->assertStringContainsString('px-4 py-2', $allClasses);
    }

    /** @test */
    public function it_renders_view()
    {
        $button = new Button();
        $view = $button->render();
        
        $this->assertEquals('componix::components.button', $view->name());
    }
}
