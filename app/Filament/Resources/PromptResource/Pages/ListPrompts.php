<?php

namespace App\Filament\Resources\PromptResource\Pages;

use App\Filament\Resources\PromptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrompts extends ListRecords
{
    protected static string $resource = PromptResource::class;
    protected static ?string $title = 'Resource Prompts';
    protected ?string $heading = ' Prompt';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
