<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class BlogUsersChart extends ChartWidget
{
    protected ?string $heading = 'Blog Users Chart';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $counts = collect(range(1, 12))->map(fn($m) => $data[$m] ?? 0)->toArray();
        return [
            'datasets' => [
                [
                    'label' => 'User created',
                    'data' => $counts,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
