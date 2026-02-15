<x-filament-panels::page>

    @php
        $graph = $this->getGraphData()->toArray();
    @endphp
    <x-filament::section>
        <livewire:network-graph
            :graph="$graph"
            :key="$this->getNetworkComponentKey()"
        />
    </x-filament::section>

</x-filament-panels::page>
