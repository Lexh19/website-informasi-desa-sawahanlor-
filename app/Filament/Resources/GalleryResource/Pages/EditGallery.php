<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use Filament\Actions;
use App\Models\gallery;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\GalleryResource;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make() ->after(
                function (gallery $record) {
                    if ($record->img) {
                        Storage::disk('public')->delete($record->img);
                    }
                }
            ),
        ];
    }
}
