<div>
    <x-filament::section>
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
    </x-filament::section>

    {{-- POPUP --}}
    <div id="node-popup"
        style="display:none;
                position:fixed;
                inset:0;
                background:rgba(0,0,0,.4);
                z-index:9999;">

        <div style="
            background:white;
            max-width:700px;
            margin:5% auto;
            padding:20px;
            border-radius:10px;
            position:relative;
        ">
            <button onclick="hideNodePopup()"
                    style="position:absolute; top:8px; right:8px;">
                ✕
            </button>

            <div id="node-popup-content"></div>
        </div>
    </div>
</div>

@once
<script src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

<script>

function showNodePopup(html) {
    document.getElementById('node-popup-content').innerHTML = html;
    document.getElementById('node-popup').style.display = 'block';
}

function hideNodePopup() {
    document.getElementById('node-popup').style.display = 'none';
}

function networkGraph(nodes, edges, options) {
    return {
        instance: null,
        datasetNodes: null,
        clickTimer: null,
        isDragging: false,

        render() {
            if (this.instance) {
                this.instance.destroy();
            }

            this.datasetNodes = new vis.DataSet(nodes);
            const datasetEdges = new vis.DataSet(edges);

            this.instance = new vis.Network(
                this.$refs.canvas,
                {
                    nodes: this.datasetNodes,
                    edges: datasetEdges,
                },
                options
            );

            // -------------------------
            // DRAG CONTROL
            // -------------------------

            this.instance.on("dragStart", () => {
                this.isDragging = true;
            });

            this.instance.on("dragEnd", () => {
                setTimeout(() => this.isDragging = false, 80);
            });

            // -----------------
            // CLICK (com delay)
            // -----------------
            this.instance.on("click", (params) => {
                if (this.isDragging) return;
                if (!params.nodes.length) return;

                clearTimeout(this.clickTimer);

                this.clickTimer = setTimeout(() => {
                    const node = this.datasetNodes.get(params.nodes[0]);

                    if (node?.popup_html) {
                        showNodePopup(node.popup_html);
                    }

                }, 220); // janela para double click
            });

            // -----------------
            // DOUBLE CLICK
            // -----------------
            this.instance.on("doubleClick", (params) => {
                if (!params.nodes.length) return;

                clearTimeout(this.clickTimer);

                const node = this.datasetNodes.get(params.nodes[0]);

                if (!node?.route_url) return;

                if (node.route_new_tab) {
                    window.open(node.route_url, '_blank');
                } else {
                    window.location.href = node.route_url;
                }
            });
        },

        focus(id) {
            if (!this.instance) return;

            this.instance.focus(id, {
                scale: 2,
                animation: true,
            });

            this.instance.selectNodes([id]);
        }
    }
}
</script>

@endonce