<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name'),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('branch_id')
                    ->label('Branch')
                    ->required()
                    ->relationship('branch', 'name'),
                DatePicker::make('date'),
                TextInput::make('cost')
                    ->required(),
                TextInput::make('category'),
                TextInput::make('condition')
                    ->required(),
                TextInput::make('details')
                    ->required()
                    ->maxLength(255),
                TextInput::make('state'),
                SpatieMediaLibraryFileUpload::make('images')
                    ->multiple(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->label('User')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('branch.name')
                    ->label('Branch')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('details')
                    ->limit(50)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cost')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('condition')
                    ->searchable()
                    ->sortable(),
                SpatieMediaLibraryImageColumn::make('images')
                    ->circular()
                    ->sortable()
                    ->stacked()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
                ->emptyStateActions([
                    Action::make('create')
                        ->label('Create post')
                        ->url(route('posts.create'))
                        ->icon('heroicon-m-plus')
                        ->button(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageItems::route('/'),
        ];
    }
}
