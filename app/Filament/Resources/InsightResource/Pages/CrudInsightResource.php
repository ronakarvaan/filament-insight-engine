<?php

namespace App\Filament\Resources\InsightResource\Pages;

use App\Filament\Resources\InsightResource;
use Filament\Resources\Pages\Page;

class CrudInsightResource extends Page
{
    protected static string $resource = InsightResource::class;

    protected static string $view = 'filament.resources.insight-resource.pages.crud-insight-resource';
}
