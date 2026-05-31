<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class AdvertisesChart extends ChartWidget
{
    protected ?string $heading = 'Advertises Chart';

    protected static ?int $sort = 3;

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
