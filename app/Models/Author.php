<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['dni', 'name', 'lastname', 'phone', 'email', 'editorial_id'];
    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }
}
