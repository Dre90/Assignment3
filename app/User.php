<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'postnr', 'phonenumber', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the post name.
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'postnr', 'postnr');
    }

    public function item() {
      return $this->hasMany(Item::class, 'userId', 'id');
    }


    public function conversationAsOwner() {
      return $this->hasMany(Conversation::class, 'ownerId', 'id');
    }

    public function conversationAsInterested() {
      return $this->hasMany(Conversation::class, 'interestedId', 'id');
    }

    public function message() {
      return $this->hasMany(Message::class, 'userId', 'id');
    }
}
