<?php

namespace App\Repositories;

use App\User;

class ItemRepository
{
    /**
     * Get all of the items for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
     
    public function forUser(User $user)
    {
        return $user->item()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
