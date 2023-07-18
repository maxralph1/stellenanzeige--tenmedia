<?php

namespace App\Policies;

use App\Models\AdditionalDocument;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdditionalDocumentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role->titel == 'super-admin' || $user->role->titel == 'admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AdditionalDocument $additionalDocument): bool
    {
        return $user->id === $additionalDocument->user_id || $user->role->titel == 'super-admin' || $user->role->titel == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AdditionalDocument $additionalDocument): bool
    {
        return $user->id === $additionalDocument->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AdditionalDocument $additionalDocument): bool
    {
        return $user->id === $additionalDocument->user_id || $user->role->titel == 'super-admin' || $user->role->titel == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AdditionalDocument $additionalDocument): bool
    {
        return $user->role->titel == 'super-admin' || $user->role->titel == 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AdditionalDocument $additionalDocument): bool
    {
        return $user->role->titel == 'super-admin' || $user->role->titel == 'admin';
    }
}
