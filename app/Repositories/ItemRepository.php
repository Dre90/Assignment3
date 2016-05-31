<?php

namespace App\Repositories;

use App\User;

class ItemRepository
{
    /**
     * Functions for getting all of the items for a given user.
     *
     * @param  User  $user
     * @return Collection
     */

    public function forUserActive(User $user)
    {
        return $user->item()
                    ->orderBy('created_at', 'DESC')
                    ->where('givenAway', 0)
                    ->get();
    }

    public function forUserGivenAway(User $user)
    {
        return $user->item()
                    ->orderBy('created_at', 'DESC')
                    ->where('givenAway', 1)
                    ->get();
    }
}
