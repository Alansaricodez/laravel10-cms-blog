<?php

namespace App\Filament\Resources\CategoryPostResource\Pages;

use App\Filament\Resources\CategoryPostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryPosts extends ListRecords
{
    protected static string $resource = CategoryPostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
