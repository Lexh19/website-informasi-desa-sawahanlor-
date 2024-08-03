<?php

namespace App\Filament\Resources\HomeResource\Pages;

use App\Models\home;
use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\HomeResource;
use Filament\Resources\Pages\EditRecord;

class EditHome extends EditRecord
{
    protected static string $resource = HomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (home $record) {
                    if ($record->img) {
                        Storage::disk('public')->delete($record->img);
                    }
                }
            ),
        ];
    }
}
