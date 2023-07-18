<?php

namespace App\Models;

use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'slug',
        'name',
        'beschreibung',
        'telefon',
        'benutzername',
        'email',
        'password',
        'firma_logo_url',
        'haus_nummer',
        'strasse',
        'stadteil',
        'postleitzahl',
        'stadt',
        'land',
        'webseite',
        'facebook_url',
        'linkedin_url',
        'threads_url',
        'twitter_url',
        'xing_url',
        'andere_social',
        'andere_social_url',
        'hinzugefügt_von_tenmedia',
        'hinzugefügt_von',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function job(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public static function booted()
    {
        parent::booted();

        self::observe(CompanyObserver::class);
    }
}
