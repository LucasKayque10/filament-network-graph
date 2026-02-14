<x-filament-panels::page>

    @php
        $graph = $this->getGraphData()->toArray();
    @endphp

    <livewire:network-graph
        :graph="$graph"
        :key="$this->getNetworkComponentKey()"
    />

</x-filament-panels::page>
