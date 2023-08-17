<?php

namespace App\Filament\Resources\CategoryPostResource\Pages;

use App\Filament\Resources\CategoryPostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryPost extends ViewRecord
{
    protected static string $resource = CategoryPostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
