<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromptResource\Pages;
use App\Models\ResourceCondition;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromptResource extends Resource
{
    protected static ?string $model = ResourceCondition::class;
    protected static ?string $navigationGroup = 'Resource';
    protected static ?string $navigationLabel = 'Prompt';
    protected static ?string $navigationIcon = 'heroicon-s-window';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('condition_name')
                                    ->label('Resource Prompt :')
                                    ->required(),
                                TextInput::make('condition_redirect')
                                    ->label('Resource Prompt Redirect Slug :')
                                    ->required(),
                            ]),
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('condition_name')->sortable(),
                TextColumn::make('condition_redirect')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListPrompts::route('/'),
            'create' => Pages\CreatePrompt::route('/create'),
            'edit' => Pages\EditPrompt::route('/{record}/edit'),
        ];
    }
}
