# Filament Network Graph

Renderize grafos interativos (nodes + edges) no Filament usando vis-network, com API fluente e integração nativa com Pages.

Permite:

- Nodes com imagem, popup HTML, rota, tamanho
- Edges configuráveis (label, dashed, arrows, width)
- Builder fluente
- Componente Livewire pronto
- Page base reutilizável
- Totalmente server-driven (dados vêm da Page)

---

## 📦 Instalação

```bash
composer require lucas-barros/filament-network-graph
```

## ✅ Requisitos

PHP 8.1+

Laravel 10+

Livewire 3

Filament 4

## 🚀 Uso rápido

1️⃣ Criar Page
php artisan make:filament-page Network

2️⃣ Estender a Page do pacote

use LucasBarros\FilamentNetwork\Pages\NetworkPage;
use LucasBarros\FilamentNetwork\Support\Node;
use LucasBarros\FilamentNetwork\Support\Edge;

class Network extends NetworkPage
{
    protected function getNodes(): array
    {
        return [
            Node::make(1, 'Pessoa A')
                ->size(30)
                ->popup('<b>Detalhes</b>'),

            Node::make(2, 'Pessoa B'),
        ];
    }

    protected function getEdges(): array
    {
        return [
            Edge::make(1, 2)
                ->label('Vínculo')
                ->arrowTo()
                ->width(2),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'physics' => [
                'enabled' => true,
            ],
        ];
    }
}

## 🧩 Node API
Node::make($id, $label)
    ->image($url)
    ->size(25)
    ->popup($html)
    ->route('/url')
    ->newTab()

## 🔗 Edge API
Edge::make($from, $to)
    ->label('Texto')
    ->width(2)
    ->dashed()
    ->arrowTo()
    ->arrowBoth()

## ⚙️ Options

As options são passadas direto para o vis-network:

protected function getOptions(): array
{
    return [
        'interaction' => [
            'dragNodes' => false,
        ],
    ];
}

## 🎯 Actions da Page

Você pode usar Actions do Filament normalmente para:

focar nodes

alternar camadas

atualizar grafo

filtros dinâmicos

O componente sempre renderiza com base no retorno de:

getNodes()
getEdges()
getOptions()

## 🪟 Popup de Node

Se o node tiver:

->popup('<html>')


abre modal ao clicar.

## 🔁 Double click → rota
->route('/pessoas/1')
->newTab()


abre no double click.

## 🏗 Builder fluente (opcional)
NetworkBuilder::make()
    ->nodes([...])
    ->edges([...])
    ->options([...])

## 📌 Recursos

Sem JS custom do usuário

Sem dependência externa além de vis-network CDN

Totalmente encapsulado

Reutilizável entre projetos

## 🛠 Roadmap

 clusters

 grupos de nodes

 export PNG

 layout presets

 filtros client-side

## 📄 Licença

MIT