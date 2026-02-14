<?php

namespace LucasBarros\FilamentNetwork\Support;

use LucasBarros\FilamentNetwork\Livewire\NetworkGraph;
use LucasBarros\FilamentNetwork\Support\GraphData;

class NetworkBuilder
{
    protected array $nodes = [];
    protected array $edges = [];
    protected array $options = [];

    public static function make(): static
    {
        return new static();
    }

    public function nodes(array $nodes): static
    {
        $this->nodes = $nodes;
        return $this;
    }

    public function edges(array $edges): static
    {
        $this->edges = $edges;
        return $this;
    }

    public function options(array $options): static
    {
        $this->options = $options;
        return $this;
    }

    // public function component(): NetworkGraph
    // {
    //     return NetworkGraph::make()
    //         ->nodes($this->nodes)
    //         ->edges($this->edges)
    //         ->options($this->options);
    // }



    public function build(): GraphData
    {
        return new GraphData(
            nodes: collect($this->nodes)->map->toArray()->values()->all(),
            edges: collect($this->edges)->map->toArray()->values()->all(),
            options: $this->options,
        );
}
}
