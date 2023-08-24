<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Filament\Resources\PostResource\Widgets\PostLikeOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Database\Eloquent\Model;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;


    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PostLikeOverview::class,
        ];
    }
}
