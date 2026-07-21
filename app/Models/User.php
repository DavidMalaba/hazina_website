<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser, HasName
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'province_id',
        'city_id',
        'role_id',
        'email',
        'phone',
        'gender',
        'birthdate',
        'bio',
        'password',
        'otp_code',
        'otp_expires_at',
        'setup_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthdate' => 'date',
            'otp_expires_at' => 'datetime',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class)->withPivot('role_in_company')->withTimestamps();
    }

    public function cohortRegistrations()
    {
        return $this->hasMany(CohortRegistration::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role && $this->role->name === 'admin';
    }

    public function getNameAttribute(): string
    {
        $name = trim("{$this->first_name} {$this->last_name}");
        return $name ?: 'Inconnu';
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function generateOtp(): string
    {
        $code = str_pad((string) random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
        $this->update([
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(15),
        ]);
        return $code;
    }

    public function generateSetupToken(): string
    {
        $token = \Illuminate\Support\Str::random(60);
        $this->update([
            'setup_token' => $token,
        ]);
        return $token;
    }

    public function authenticationLogs()
    {
        return $this->hasMany(AuthenticationLog::class);
    }
}
