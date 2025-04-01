<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['isbn', 'title', 'author', 'description', 'author_id'];
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'author_id');
    }
}
