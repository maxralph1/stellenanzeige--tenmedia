<?php

namespace App\Observers;

use App\Models\Job;
use Illuminate\Support\Str;

class JobObserver
{
    /**
     * Handle the Job "creating" event.
     */
    public function creating(Job $job): void
    {
        $job->slug = str(
            $job->company->name .
                $job->user->vorname .
                $job->user->nachname .
                Str::uuid()->getHex() .
                now()->format('YmdHis')
        )->slug();
    }
}
