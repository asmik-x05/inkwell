<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use Filament\Widgets\ChartWidget;

class BlogCommentsChart extends ChartWidget
{
    protected ?string $heading = 'Blog Comments Chart';

    protected static ?int $sort = 5;
    protected function getData(): array
    {
        $data = Comment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $counts = collect(range(1, 12))->map(fn($m) => $data[$m] ?? 0)->toArray();
        return [
            'datasets' => [
                [
                    'label' => 'Comments Added',
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
