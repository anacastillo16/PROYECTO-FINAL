<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'description', 'author_id'];
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
