<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BlogUsersChart extends ChartWidget
{
    protected ?string $heading = 'Blog Users Chart';

    protected static ?int $sort = 2;

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
