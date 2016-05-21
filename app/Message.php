<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function conversation() {
    return $this->belongsTo(Conversation::class, 'id');
  }

  public function user() {
    return $this->belongsTo(User::class, 'id');
  }
}
