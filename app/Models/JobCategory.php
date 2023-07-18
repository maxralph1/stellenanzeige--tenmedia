<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCategory extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'titel',
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
