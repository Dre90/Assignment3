<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
    * Get the item's category.
    */
    public function category() {
      return $this->belongsTo(Category::class, 'categoryId');
    }

    /**
    * Get the item's user.
    */
    public function user() {
      return $this->belongsTo(User::class, 'userId', 'id');
    }

    /**
    * Get the item's conversations.
    */
    public function conversation() {
      return $this->hasMany(Conversation::class, 'itemId', 'id');
    }
}
