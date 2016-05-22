<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
  /**
  * Get the conversation's owner.
  */
  public function ownerUser() {
    return $this->belongsTo(User::class, 'ownerId', 'id');
  }

  /**
  * Get the conversation's interested user.
  */
  public function interestedUser() {
    return $this->belongsTo(User::class, 'interestedId', 'id');
  }

  /**
  * Get the conversation's item.
  */
  public function item() {
    return $this->belongsTo(Item::class, 'itemId', 'id');
  }

  /**
  * Get the conversation's messages.
  */
  public function message() {
    return $this->hasMany(Message::class, 'conversationId', 'id');
  }
}
