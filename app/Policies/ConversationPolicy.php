<?php

namespace App\Policies;

use App\User;
use App\Conversation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     *  Determine if the given user can create a new message in the given conversation,
     *  or view a given conversation
     *
     * @param  User  $user
     * @param  Conversation  $conversation
     * @return bool
     */
     public function store(User $user, Conversation $conversation)
     {
       return ($user->id===$conversation->ownerId) || ($user->id===$conversation->interestedId);
     }

     public function show(User $user, Conversation $conversation)
     {
       return ($user->id===$conversation->ownerId) || ($user->id===$conversation->interestedId);
     }
}
