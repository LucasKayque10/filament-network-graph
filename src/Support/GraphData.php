<?php

namespace LucasBarros\FilamentNetwork\Support;

use Illuminate\Contracts\Support\Arrayable;

class GraphData implements Arrayable
{
    public function __construct(
        public array $nodes,
        public array $edges,
        public array $options,
    ) {}

    public function toArray(): array
    {
        return [
            'nodes' => $this->nodes,
            'edges' => $this->edges,
            'options' => $this->options,
        ];
    }
}
