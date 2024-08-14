<?php

namespace App\Filament\Resources\HousekeepingEmployeeResource\Pages;

use App\Filament\Resources\HousekeepingEmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHousekeepingEmployees extends ListRecords
{
    protected static string $resource = HousekeepingEmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
