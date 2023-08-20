<?php

namespace App\Policies;

use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StorePolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Store $store): bool
    {
        //
        return $user->id === $store->user_id;
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Store $store): bool
    {
        //
        return $user->id === $store->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Store $store): bool
    {
        //
        return $user->id === $store->user_id;
    }


}
