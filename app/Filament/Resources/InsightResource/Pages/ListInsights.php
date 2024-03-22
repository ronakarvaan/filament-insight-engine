<?php

namespace App\Filament\Resources\InsightResource\Pages;

use App\Filament\Resources\InsightResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsights extends ListRecords
{
    protected static string $resource = InsightResource::class;
    protected static ?string $title = 'Resource';
    protected ?string $heading = 'Resource';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
