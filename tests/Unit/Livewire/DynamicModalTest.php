<?php

namespace Componix\Componix\Tests\Unit\Livewire;

use Componix\Componix\Tests\TestCase;
use Componix\Componix\Http\Livewire\DynamicModal;
use Livewire\Livewire;

class DynamicModalTest extends TestCase
{
    /** @test */
    public function it_can_be_mounted()
    {
        Livewire::test(DynamicModal::class)
            ->assertSet('isOpen', false)
            ->assertSet('title', '')
            ->assertSet('content', '')
            ->assertSet('size', 'md');
    }

    /** @test */
    public function it_can_open_modal()
    {
        Livewire::test(DynamicModal::class)
            ->call('openModal', 'Test Title', 'Test Content', 'lg')
            ->assertSet('isOpen', true)
            ->assertSet('title', 'Test Title')
            ->assertSet('content', 'Test Content')
            ->assertSet('size', 'lg');
    }

    /** @test */
    public function it_can_close_modal()
    {
        Livewire::test(DynamicModal::class)
            ->call('openModal', 'Test Title', 'Test Content')
            ->assertSet('isOpen', true)
            ->call('closeModal')
            ->assertSet('isOpen', false);
    }

    /** @test */
    public function it_listens_to_open_modal_event()
    {
        Livewire::test(DynamicModal::class)
            ->emit('openModal', [
                'title' => 'Event Title',
                'content' => 'Event Content',
                'size' => 'xl'
            ])
            ->assertSet('isOpen', true)
            ->assertSet('title', 'Event Title')
            ->assertSet('content', 'Event Content')
            ->assertSet('size', 'xl');
    }

    /** @test */
    public function it_listens_to_close_modal_event()
    {
        Livewire::test(DynamicModal::class)
            ->call('openModal', 'Test', 'Test')
            ->assertSet('isOpen', true)
            ->emit('closeModal')
            ->assertSet('isOpen', false);
    }

    /** @test */
    public function it_renders_correctly()
    {
        Livewire::test(DynamicModal::class)
            ->assertViewIs('componix::livewire.dynamic-modal');
    }
}
