<?php

namespace LucasBarros\FilamentNetwork\Contracts;

use LucasBarros\FilamentNetwork\Support\GraphData;

interface HasNetworkGraph
{
    public function getGraphData(): GraphData;

    public function getNodes(): array;

    public function getEdges(): array;

    public function getOptions(): array;
}
