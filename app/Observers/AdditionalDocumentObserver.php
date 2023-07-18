<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\AdditionalDocument;

class AdditionalDocumentObserver
{
    /**
     * Handle the AdditionalDocument "creating" event.
     */
    public function creating(AdditionalDocument $additionalDocument): void
    {
        $additionalDocument->slug = str(
            $additionalDocument->user->vorname .
                $additionalDocument->user->nachname .
                $additionalDocument->dokument_titel .
                Str::uuid()->getHex() .
                now()->format('YmdHis')
        )->slug();
    }
}
