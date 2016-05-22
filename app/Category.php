<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
  * Get the Category's items.
  */
  public function item() {
    return $this->hasMany(Item::class, 'categoryId', 'id');
  }
}
