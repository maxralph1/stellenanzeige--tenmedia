<?php

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Str;

class CompanyObserver
{
    /**
     * Handle the Company "creating" event.
     */
    public function creating(Company $company): void
    {
        $company->slug = str(
            $company->name .
                Str::uuid()->getHex() .
                now()->format('YmdHis')
        )->slug();
    }
}
