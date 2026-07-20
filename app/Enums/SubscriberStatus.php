<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SubscriberStatus: string implements HasLabel, HasColor
{
    case Active = 'active';
    case Unsubscribed = 'unsubscribed';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Active => 'Actif',
            self::Unsubscribed => 'Désabonné',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Active => 'success',
            self::Unsubscribed => 'danger',
        };
    }
}
