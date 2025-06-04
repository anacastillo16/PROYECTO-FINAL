<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $fillable = ['name', 'lastname', 'email', 'password', 'rol'];

    protected $hidden = [ "password"];

    public function favoriteBooks()
    {
        return $this->belongsToMany(Book::class, 'favoritos');
    }

}
