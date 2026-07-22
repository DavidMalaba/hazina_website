<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(32));
        return $data;
    }

    protected function afterCreate(): void
    {
        $user = $this->record;
        
        $token = $user->generateSetupToken();
        $otp = $user->generateOtp();
        
        $setupUrl = url('/setup-password/' . $token);
        
        \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\AdminSetupAccountMail($user, $setupUrl, $otp));
    }
}
