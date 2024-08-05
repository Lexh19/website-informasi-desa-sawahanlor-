<?php

namespace App\Filament\Resources\ServisResource\Pages;

use Filament\Actions;
use App\Models\servis;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ServisResource;

class EditServis extends EditRecord
{
    protected static string $resource = ServisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (servis $record) {
                    if ($record->img) {
                        Storage::disk('public')->delete($record->img);
                    }
                }
            ),
        ];
    }
}
