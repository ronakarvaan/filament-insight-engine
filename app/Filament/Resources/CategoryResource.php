<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\ResourceCategory;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = ResourceCategory::class;
    protected static ?string $navigationGroup = 'Resource';

    protected static ?string $navigationIcon = 'heroicon-m-wallet';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->placeholder('Resource Category Name')
                                    ->label('Resource Category Name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->unique(ResourceCategory::class, 'name', ignoreRecord: true),
                                // FileUpload::make('category_image')
                                //     ->label('Category Image')
                                //     ->disk('s3')
                                //     ->required()
                                //     ->acceptedFileTypes(['image/png', 'image/jpeg'])
                                //     ->image(),
                                // ->directory('form-attachments'),
                                RichEditor::make('description')
                                    ->label('Description'),
                            ]),
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('description')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
