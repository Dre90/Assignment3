<?php

namespace App\Repositories;

use App\User;

class ConversationRepository
{
    /**
     * Functions for getting all of the conversations for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
     
    public function forUserConvoOwner(User $user)
    {
        return $user->conversationAsOwner()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }

    public function forUserConvoInterested(User $user)
    {
        return $user->conversationAsInterested()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
