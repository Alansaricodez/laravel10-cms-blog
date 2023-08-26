<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        return [
            Card::make('Users', User::count()),
            Card::make('Categories', Category::count()),
            Card::make('Posts', Post::count()),
            Card::make('Messages', Message::count()),
        ];
    }
}
