<?php

namespace App\Models;

use App\Observers\JobObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'company_id',
        'user_id',
        'slug',
        'bezeichnung',
        'beschreibung',
        'standort',
        'bewerbungen_per_email_erhalten',
        'email_bucket_für_bewerbungen',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function application(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public static function booted()
    {
        parent::booted();

        self::observe(JobObserver::class);
    }
}
