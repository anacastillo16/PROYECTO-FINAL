<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = ['name', 'address'];

    public function autors()
    {
        return $this->hasMany(Author::class);
    }
}
