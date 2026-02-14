<?php

namespace LucasBarros\FilamentNetwork\Support;

class Node
{
    protected array $data = [];

    public static function make($id, string $label = null): static
    {
        $n = new static;
        $n->data['id'] = $id;

        if ($label !== null) {
            $n->data['label'] = $label;
        }

        return $n;
    }

    /* =========================
     * Básico
     * ========================= */

    public function label(string $label): static
    {
        $this->data['label'] = $label;
        return $this;
    }

    public function shape(string $shape): static
    {
        $this->data['shape'] = $shape;
        return $this;
    }

    public function size(int|float $size): static
    {
        $this->data['size'] = $size;
        return $this;
    }

    public function value(int|float $value): static
    {
        $this->data['value'] = $value;
        return $this;
    }

    public function group(string|int $group): static
    {
        $this->data['group'] = $group;
        return $this;
    }

    public function hidden(bool $state = true): static
    {
        $this->data['hidden'] = $state;
        return $this;
    }

    public function opacity(float $opacity): static
    {
        $this->data['opacity'] = $opacity;
        return $this;
    }

    public function level(int $level): static
    {
        $this->data['level'] = $level;
        return $this;
    }

    public function mass(float $mass): static
    {
        $this->data['mass'] = $mass;
        return $this;
    }

    public function physics(bool $state = true): static
    {
        $this->data['physics'] = $state;
        return $this;
    }

    /* =========================
     * Bordas
     * ========================= */

    public function borderWidth(int $px): static
    {
        $this->data['borderWidth'] = $px;
        return $this;
    }

    public function borderWidthSelected(int $px): static
    {
        $this->data['borderWidthSelected'] = $px;
        return $this;
    }

    /* =========================
     * Cor
     * ========================= */

    public function color(array $color): static
    {
        $this->data['color'] = $color;
        return $this;
    }

    public function colorSimple(string $background, string $border = null): static
    {
        $this->data['color'] = [
            'background' => $background,
            'border' => $border ?? $background,
        ];

        return $this;
    }

    /* =========================
     * Fonte
     * ========================= */

    public function font(array $font): static
    {
        $this->data['font'] = $font;
        return $this;
    }

    public function fontSize(int $px): static
    {
        $this->data['font']['size'] = $px;
        return $this;
    }

    public function fontColor(string $color): static
    {
        $this->data['font']['color'] = $color;
        return $this;
    }

    public function fontAlign(string $align): static
    {
        $this->data['font']['align'] = $align;
        return $this;
    }

    /* =========================
     * Imagem / Ícone
     * ========================= */

    public function image(string $url): static
    {
        $this->data['shape'] = 'image';
        $this->data['image'] = $url;
        return $this;
    }

    public function brokenImage(string $url): static
    {
        $this->data['brokenImage'] = $url;
        return $this;
    }

    public function imagePadding(int $all): static
    {
        $this->data['imagePadding'] = [
            'left' => $all,
            'right' => $all,
            'top' => $all,
            'bottom' => $all,
        ];
        return $this;
    }

    public function icon(array $icon): static
    {
        $this->data['icon'] = $icon;
        return $this;
    }

    /* =========================
     * Fixed / posição
     * ========================= */

    public function fixed(bool $x = true, bool $y = true): static
    {
        $this->data['fixed'] = compact('x','y');
        return $this;
    }

    public function position(float $x, float $y): static
    {
        $this->data['x'] = $x;
        $this->data['y'] = $y;
        return $this;
    }

    /* =========================
     * Constraints
     * ========================= */

    public function widthConstraint(int|array|false $value): static
    {
        $this->data['widthConstraint'] = $value;
        return $this;
    }

    public function heightConstraint(int|array|false $value): static
    {
        $this->data['heightConstraint'] = $value;
        return $this;
    }

    /* =========================
     * Scaling
     * ========================= */

    public function scaling(array $scaling): static
    {
        $this->data['scaling'] = $scaling;
        return $this;
    }

    /* =========================
     * Shadow
     * ========================= */

    public function shadow(array|bool $shadow): static
    {
        $this->data['shadow'] = $shadow;
        return $this;
    }

    /* =========================
     * Shape properties
     * ========================= */

    public function shapeProperties(array $props): static
    {
        $this->data['shapeProperties'] = $props;
        return $this;
    }

    /* =========================
     * Label options
     * ========================= */

    public function labelHighlightBold(bool $state = true): static
    {
        $this->data['labelHighlightBold'] = $state;
        return $this;
    }

    public function chosen(bool|array $value): static
    {
        $this->data['chosen'] = $value;
        return $this;
    }

    /* =========================
     * Tooltip / Title
     * ========================= */

    public function title(string $html): static
    {
        $this->data['title'] = $html;
        return $this;
    }

    public function popup(string $html): static
    {
        $this->data['popup_html'] = $html;
        return $this;
    }

    /* =========================
     * Routing (seu extra)
     * ========================= */

    public function route(string $url): static
    {
        $this->data['route_url'] = $url;
        return $this;
    }

    public function routeOnNewTab(bool $state = true): static
    {
        $this->data['route_new_tab'] = $state;
        return $this;
    }

    /* =========================
     * Final
     * ========================= */

    public function toArray(): array
    {
        return $this->data;
    }
}
