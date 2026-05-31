<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BlogCommentsChart extends ChartWidget
{
    protected ?string $heading = 'Blog Comments Chart';

    protected static ?int $sort = 5;
    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
