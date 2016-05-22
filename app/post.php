<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * Get all users with a specific postnr.
    */
    public function users()
    {
        return $this->hasMany(User::class, 'postnr', 'postnr');
    }
}
