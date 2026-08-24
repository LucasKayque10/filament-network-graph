<div
    x-data="{
        title: '',
        html: '',

        showPopup(event) {
            this.title = event.detail.title;
            this.html = event.detail.html;

            this.$dispatch('open-modal', {
                id: 'network-node-modal',
            });
        },
    }"
    x-on:network-node-popup.window="showPopup($event)"
>
    <div
        wire:ignore
        class="bg-white"
        x-data="networkGraph(@js($nodes), @js($edges), @js($options))"
        x-init="render()"
        x-on:network-refresh.window="render()"
        x-on:network-focus.window="focus($event.detail.id)"
        style="height:70vh"
        x-ref="canvas">
    </div>

    <x-filament::modal
        id="network-node-modal"
        width="2xl"
    >
        <x-slot name="heading">
            <span x-text="title"></span>
        </x-slot>

        <div
            x-html="html"
            class="max-h-[70vh] overflow-y-auto dark:text-white 
            dark:[&_*]:!text-white"
        ></div>
        
    </x-filament::modal>

    <style>
        .network-popup-content * {
            color: white !important;
        }
    </style>
</div>

@once

<script>{!! network_asset('vis-network-min.js') !!}</script>
<script>{!! network_asset('script.js') !!}</script>

@endonce