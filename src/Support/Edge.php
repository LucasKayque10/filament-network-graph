<?php

namespace LucasBarros\FilamentNetwork\Support;

class Edge
{
    protected array $data = [];

    public static function make(int|string $from, int|string $to): static
    {
        $edge = new static();

        $edge->data['from'] = $from;
        $edge->data['to'] = $to;

        return $edge;
    }

    /* =========================
     * Label
     * ========================= */

    public function label(string $label): static
    {
        $this->data['label'] = $label;
        return $this;
    }

    public function title(string $html): static
    {
        $this->data['title'] = $html;
        return $this;
    }

    public function labelHighlightBold(bool $state = true): static
    {
        $this->data['labelHighlightBold'] = $state;
        return $this;
    }

    /* =========================
     * Font
     * ========================= */

    public function font(array $font): static
    {
        $this->data['font'] = $font;
        return $this;
    }

    public function fontSize(int $size): static
    {
        $this->data['font']['size'] = $size;
        return $this;
    }

    public function fontAlign(string $align = 'horizontal'): static
    {
        $this->data['font']['align'] = $align;
        return $this;
    }

    public function fontColor(string $color): static
    {
        $this->data['font']['color'] = $color;
        return $this;
    }

    /* =========================
     * Color
     * ========================= */

    public function color(string|array $color): static
    {
        $this->data['color'] = $color;
        return $this;
    }

    public function colorSimple(string $color): static
    {
        $this->data['color'] = [
            'color' => $color,
            'highlight' => $color,
            'hover' => $color,
        ];
        return $this;
    }

    public function colorOpacity(float $opacity): static
    {
        $this->data['color']['opacity'] = $opacity;
        return $this;
    }

    public function colorInherit(string|bool $inherit): static
    {
        $this->data['color']['inherit'] = $inherit;
        return $this;
    }

    /* =========================
     * Width / Size
     * ========================= */

    public function width(int|float $width): static
    {
        $this->data['width'] = $width;
        return $this;
    }

    public function hoverWidth(int|float $width): static
    {
        $this->data['hoverWidth'] = $width;
        return $this;
    }

    public function selectionWidth(int|float $width): static
    {
        $this->data['selectionWidth'] = $width;
        return $this;
    }

    public function widthConstraint(int|array|false $value): static
    {
        $this->data['widthConstraint'] = $value;
        return $this;
    }

    public function value(int|float $value): static
    {
        $this->data['value'] = $value;
        return $this;
    }

    public function length(int $px): static
    {
        $this->data['length'] = $px;
        return $this;
    }

    /* =========================
     * Style
     * ========================= */

    public function dashed(bool|array $state = true): static
    {
        $this->data['dashes'] = $state;
        return $this;
    }

    public function hidden(bool $state = true): static
    {
        $this->data['hidden'] = $state;
        return $this;
    }

    public function physics(bool $state = true): static
    {
        $this->data['physics'] = $state;
        return $this;
    }

    public function chosen(bool|array $value): static
    {
        $this->data['chosen'] = $value;
        return $this;
    }

    public function arrowStrikethrough(bool $state = true): static
    {
        $this->data['arrowStrikethrough'] = $state;
        return $this;
    }

    /* =========================
     * Arrows
     * ========================= */

    public function arrows(string|array $config): static
    {
        $this->data['arrows'] = $config;
        return $this;
    }

    public function arrowTo(bool $enabled = true): static
    {
        $this->data['arrows']['to']['enabled'] = $enabled;
        return $this;
    }

    public function arrowFrom(bool $enabled = true): static
    {
        $this->data['arrows']['from']['enabled'] = $enabled;
        return $this;
    }

    public function arrowMiddle(bool $enabled = true): static
    {
        $this->data['arrows']['middle']['enabled'] = $enabled;
        return $this;
    }

    public function arrowScale(float $factor): static
    {
        $this->data['arrows']['to']['scaleFactor'] = $factor;
        return $this;
    }

    public function arrowImage(string $src, int $w = null, int $h = null): static
    {
        $this->data['arrows']['to'] = [
            'enabled' => true,
            'type' => 'image',
            'src' => $src,
            'imageWidth' => $w,
            'imageHeight' => $h,
        ];
        return $this;
    }

    /* =========================
     * Smooth
     * ========================= */

    public function smooth(bool|array|string $config = true): static
    {
        if (is_string($config)) {
            $this->data['smooth'] = [
                'enabled' => true,
                'type' => $config,
            ];
        } else {
            $this->data['smooth'] = $config;
        }

        return $this;
    }

    public function smoothRoundness(float $value): static
    {
        $this->data['smooth']['roundness'] = $value;
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
     * Self reference
     * ========================= */

    public function selfReferenceSize(int $size): static
    {
        $this->data['selfReferenceSize'] = $size;
        return $this;
    }

    public function selfReference(array $config): static
    {
        $this->data['selfReference'] = $config;
        return $this;
    }

    /* =========================
     * Offset
     * ========================= */

    public function endPointOffset(int $from = 0, int $to = 0): static
    {
        $this->data['endPointOffset'] = compact('from','to');
        return $this;
    }

    /* =========================
     * Interaction
     * ========================= */

    public function selectable(bool $state = true): static
    {
        $this->data['selectable'] = $state;
        return $this;
    }

    /* =========================
     * Metadata extra
     * ========================= */

    public function meta(string $key, mixed $value): static
    {
        $this->data[$key] = $value;
        return $this;
    }

    /* =========================
     * Export
     * ========================= */

    public function toArray(): array
    {
        return $this->data;
    }
}
