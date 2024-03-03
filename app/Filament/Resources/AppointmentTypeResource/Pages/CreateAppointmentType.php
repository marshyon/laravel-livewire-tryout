<?php

namespace App\Filament\Resources\AppointmentTypeResource\Pages;

use App\Filament\Resources\AppointmentTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointmentType extends CreateRecord
{
    protected static string $resource = AppointmentTypeResource::class;


    protected function getFormActions(): array
    {
        return array_merge(
            parent::getFormActions(),
            [
                Actions\Action::make('publish')
                    ->action(function () {
                        $this->form->fill();
                    })
            ],
        );
    }
}
