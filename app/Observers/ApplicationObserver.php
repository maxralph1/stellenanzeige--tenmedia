<?php

namespace App\Observers;

use App\Models\Application;
use Illuminate\Support\Str;

class ApplicationObserver
{
    /**
     * Handle the Application "creating" event.
     */
    public function creating(Application $application): void
    {
        $application->slug = str(
            $application->job->bezeichnung .
                $application->user->vorname .
                $application->user->nachname .
                Str::uuid()->getHex() .
                now()->format('YmdHis')
        )->slug();
    }
}
