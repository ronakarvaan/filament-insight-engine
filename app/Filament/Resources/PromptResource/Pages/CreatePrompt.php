<?php

namespace App\Filament\Resources\PromptResource\Pages;

use App\Filament\Resources\PromptResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePrompt extends CreateRecord
{
    protected static string $resource = PromptResource::class;
    protected static ?string $title = 'Resource Prompts';
    protected ?string $heading = 'Create Prompt';
}
