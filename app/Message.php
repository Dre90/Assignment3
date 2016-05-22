<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  /**
   * Get the messages' conversation.
   */
  public function conversation() {
    return $this->belongsTo(Conversation::class, 'conversationId', 'id');
  }

  /**
   * Get the messages' user.
   */
  public function user() {
    return $this->belongsTo(User::class, 'userId', 'id');
  }
}
