<?php

namespace App\Filament\Widgets;

use App\Models\Advertise;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        return [
            $this->buildStat('Posts', Post::class, $startOfMonth, $startOfLastMonth, $endOfLastMonth),
            $this->buildStat('Comments', Comment::class, $startOfMonth, $startOfLastMonth, $endOfLastMonth),
            $this->buildStat('Users', User::class, $startOfMonth, $startOfLastMonth, $endOfLastMonth),
            $this->buildStat('Advertises', Advertise::class, $startOfMonth, $startOfLastMonth, $endOfLastMonth),
        ];
    }

    private function buildStat(string $label, string $model, $startOfMonth, $startOfLastMonth, $endOfLastMonth): Stat
    {
        $thisMonth = $model::where('created_at', '>=', $startOfMonth)->count();
        $total = $thisMonth;
        $lastMonth = $model::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();

        if ($lastMonth === 0) {
            $description = $thisMonth > 0 ? "+{$thisMonth} new this month" : 'No data last month';
            $icon = 'heroicon-m-arrow-trending-up';
            $color = 'success';
        } else {
            $change = round((($thisMonth - $lastMonth) / $lastMonth) * 100, 1);
            $abs = abs($change);

            if ($change >= 0) {
                $description = "+{$abs}% more than last month";
                $icon = 'heroicon-m-arrow-trending-up';
                $color = 'success';
            } else {
                $description = "{$abs}% less than last month";
                $icon = 'heroicon-m-arrow-trending-down';
                $color = 'danger';
            }
        }

        return Stat::make($label, $total)
            ->description($description)
            ->descriptionIcon($icon)
            ->color($color);
    }
}
