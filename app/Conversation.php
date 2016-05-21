<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
  public function ownerUser() {
    return $this->belongsTo(User::class, 'id', 'ownerId');
  }

  public function interestedUser() {
    return $this->belongsTo(User::class, 'id', 'interestedId');
  }

  public function item() {
    return $this->belongsTo(Item::class, 'id');
  }

  public function message() {
    return $this->hasMany(Message::class, 'id');
  }
}
