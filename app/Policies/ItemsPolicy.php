<?php

namespace App\Policies;

use App\User;
use App\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete or modify the given task.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return bool
     */
    public function destroy(User $user, Item $item)
    {
        return $user->id === $item->userId;
    }

    public function update(User $user, Item $item)
    {
        return $user->id === $item->userId;
    }
}
