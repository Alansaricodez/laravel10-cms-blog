<?php

namespace App\Filament\Resources\CategoryPostResource\Pages;

use App\Filament\Resources\CategoryPostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryPost extends EditRecord
{
    protected static string $resource = CategoryPostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
