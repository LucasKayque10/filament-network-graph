<?php

namespace LucasBarros\FilamentNetwork\Pages;

use Filament\Pages\Page;
use LucasBarros\FilamentNetwork\Support\GraphData;
use LucasBarros\FilamentNetwork\Support\NetworkBuilder;
use LucasBarros\FilamentNetwork\Contracts\HasNetworkGraph;

abstract class NetworkPage extends Page implements HasNetworkGraph
{

    protected string $view =  'filament-network::network-page';

    /*
    |--------------------------------------------------------------------------
    | Hooks opcionais
    |--------------------------------------------------------------------------
    */

    protected function getNetworkComponentKey(): string
    {
        // default estável → sem re-render
        return static::class;
    }

    protected function shouldAutoRefreshOnAction(): bool
    {
        return false;
    }

    /*
    |--------------------------------------------------------------------------
    | Builder padrão
    |--------------------------------------------------------------------------
    */

    public function getGraphData(): GraphData
    {
        return NetworkBuilder::make()
            ->nodes($this->getNodes())
            ->edges($this->getEdges())
            ->options($this->getOptions())
            ->build();
    }

    public function getOptions(): array
    {
        return [

            'autoResize' => true,

            'physics' => [
                'enabled' => true,
                'stabilization' => false,
                'barnesHut' => [
                    'gravitationalConstant' => -2500,
                    'springLength' => 140,
                ],
            ],

            'interaction' => [
                'hover' => true,
                'dragNodes' => true,
                'dragView' => true,
                'multiselect' => false,
                'selectable' => true,
            ],

            'layout' => [
                'improvedLayout' => true,
            ],

            'nodes' => [
                'borderWidth' => 2,
                'font' => [
                    'size' => 14,
                ],
            ],

            'edges' => [
                'smooth' => [
                    'type' => 'dynamic',
                ],
                'font' => [
                    'size' => 12,
                    'align' => 'middle',
                ],
            ],

        ];
    }
}
