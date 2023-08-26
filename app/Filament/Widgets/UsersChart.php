<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\BarChartWidget;

class UsersChart extends BarChartWidget
{
    protected static ?int $sort = 2;

    protected static ?string $heading = 'Users';

    protected function getData(): array
    {
        $users = User::select('created_at')->get()->groupBy(function($users){
            return Carbon::parse($users->created_at)->format('F');
        });
        $quantity = [];

        foreach($users as $user => $value){
            array_push($quantity, $value->count());
        }

        return [
            'datasets' => [
                [
                    'label' => 'Users Added',
                    'data' => $quantity,
                    'backgroundColor' => [

                        'rgba(54,162,235,0.2)',

                    ],
                    'borderColor' => [
                        'rgba(54,162,235)',

                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => $users->keys(),
        ];
    }
}
