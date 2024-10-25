<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ideals;
use Illuminate\Auth\Access\HandlesAuthorization;

class IdeaPolicy
{

    // public function update(User $user, ideals $ideals): bool
    // {
    //     return ($user->is_admin || $user->id === $ideals->user_id);
    // }

    // public function delete(User $user, ideals $ideals) :bool
    // {
    //     return ($user->is_admin || $user->id === $ideals->user_id);
    // }
}
