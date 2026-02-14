<?php

namespace LucasBarros\FilamentNetwork\Livewire;

use Livewire\Component;

class NetworkGraph extends Component
{
    public array $nodes = [];
    public array $edges = [];
    public array $options = [];

    /*
    |--------------------------------------------------------------------------
    | Mount — recebe graph completo
    |--------------------------------------------------------------------------
    */

    public function mount($graph): void
    {
        // Se veio objeto → converte
        if (is_object($graph)) {
            if (method_exists($graph, 'toArray')) {
                $graph = $graph->toArray();
            } else {
                $graph = [
                    'nodes' => $graph->nodes ?? [],
                    'edges' => $graph->edges ?? [],
                    'options' => $graph->options ?? [],
                ];
            }
        }

        // Normaliza nodes/edges caso ainda sejam builders
        $this->nodes = collect($graph['nodes'] ?? [])
            ->map(fn ($n) => is_object($n) && method_exists($n, 'toArray') ? $n->toArray() : $n)
            ->values()
            ->all();

        $this->edges = collect($graph['edges'] ?? [])
            ->map(fn ($e) => is_object($e) && method_exists($e, 'toArray') ? $e->toArray() : $e)
            ->values()
            ->all();

        $this->options = $graph['options'] ?? [];
    }

    /*
    |--------------------------------------------------------------------------
    | API fluente (opcional — mantém compatibilidade)
    |--------------------------------------------------------------------------
    */

    public static function make(): static
    {
        return new static();
    }

    public function nodes(array $nodes): static
    {
        $this->nodes = collect($nodes)->map->toArray()->values()->all();
        return $this;
    }

    public function edges(array $edges): static
    {
        $this->edges = collect($edges)->map->toArray()->values()->all();
        return $this;
    }

    public function options(array $options): static
    {
        $this->options = $options;
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    public function render()
    {
        return view('filament-network::network-graph');
    }
}
