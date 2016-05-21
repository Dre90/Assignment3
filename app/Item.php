<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category() {
      return $this->belongsTo(Category::class, 'categoryId');
    }

    public function user() {
      return $this->belongsTo(User::class, 'id', 'userId');
    }

    public function conversation() {
      return $this->hasMany(Conversation::class, 'id');
    }
}
