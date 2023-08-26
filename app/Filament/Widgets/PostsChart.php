<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class PostsChart extends LineChartWidget
{
    protected static ?string $heading = 'Posts';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $posts = Post::select('created_at')->get()->groupBy(function($posts){
            return Carbon::parse($posts->created_at)->format('F');
        });

        $quantity = [];

        foreach($posts as $post => $value){
            array_push($quantity, $value->count());
        }
        return [
            'datasets' => [
                [
                    'label' => 'posts Added',
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
            'labels' => $posts->keys(),
        ];
    }
}
