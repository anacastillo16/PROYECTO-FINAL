<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'description', 'image', 'autor_id'];
    public function autor()
    {
        return $this->belongsTo(Author::class, 'autor_id');
    }

    public function favoredByUsers()
    {
        return $this->belongsToMany(User::class, 'favoritos');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }   

}
