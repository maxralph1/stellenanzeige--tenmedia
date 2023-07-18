<?php

namespace App\Models;

use App\Observers\ApplicationObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'job_id',
        'user_id',
        'slug',
        'anschreiben',
        'anschreiben_url',
        'lebenslauf_url',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function booted()
    {
        parent::booted();

        self::observe(ApplicationObserver::class);
    }
}
