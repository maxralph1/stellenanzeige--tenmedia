<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name',
        // 'email',
        // 'password',
        'role_id',
        'vorname',
        'zweitename',
        'nachname',
        'benutzername',
        'telefon',
        'email',
        'password',
        // 'profil_foto_url',
        'haus_nummer',
        'strasse',
        'stadteil',
        'postleitzahl',
        'stadt',
        'land',
        'webseite',
        'facebook_url',
        'github_url',
        'linkedin_url',
        'threads_url',
        'twitter_url',
        'xing_url',
        'andere_social',
        'andere_social_url',
        'anschreiben',
        'anschreiben_url',
        'lebenslauf_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(role::class);
    }

    public function additionalDocument(): HasMany
    {
        return $this->hasMany(AdditionalDocument::class);
    }

    public function application(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function company(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    public function job(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
