<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryPostResource\Pages;
use App\Filament\Resources\CategoryPostResource\RelationManagers;
use App\Models\CategoryPost;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryPostResource extends Resource
{
    protected static ?string $model = CategoryPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Content';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('post_id')
                    ->relationship('post', 'title')
                    ->searchable()
                    ->required(),
             
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_id'),
                Tables\Columns\TextColumn::make('post_id'),
       
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoryPosts::route('/'),
            'create' => Pages\CreateCategoryPost::route('/create'),
            'view' => Pages\ViewCategoryPost::route('/{record}'),
            'edit' => Pages\EditCategoryPost::route('/{record}/edit'),
        ];
    }    
}
