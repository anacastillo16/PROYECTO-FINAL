<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = ['name', 'address'];

    public function authors()
    {
        return $this->hasMany(Author::class);
    }
}
