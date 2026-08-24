<?php

namespace LucasBarros\FilamentNetwork\Livewire;

use LucasBarros\Network\Livewire\NetworkGraph as BaseNetworkGraph;

class NetworkGraph extends BaseNetworkGraph
{
    public function render()
    {
        return view('filament-network-graph::network-graph');
    }
}