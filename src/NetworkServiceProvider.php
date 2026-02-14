<?php

namespace LucasBarros\FilamentNetwork;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use LucasBarros\FilamentNetwork\Livewire\NetworkGraph;

class NetworkServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-network');

        Livewire::component('network-graph', NetworkGraph::class);
    }
}
