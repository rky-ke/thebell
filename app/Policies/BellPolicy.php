<?php

namespace App\Policies;

use App\Models\Bell;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BellPolicy
{
    /**
     * Determine whether the user can modify any models.
     */
    public function modifyAny(User $user, Bell $bell)
    {
        return $user->id === $bell->user_id
            ? Response::allow()
            : Response::deny('You do not own this bell.');
    }
}
