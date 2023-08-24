<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\Widget;

class PostLikeOverview extends Widget
{
    protected static string $view = 'filament.resources.post-resource.widgets.post-like-overview';

    public ?Post $record = null;

    protected int | string | array $columnSpan = 1;
}
