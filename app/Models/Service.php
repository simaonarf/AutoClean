<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'default_price'];

    public function entries()
    {
        return $this->belongsToMany(Entry::class)->withPivot('price')->withTimestamps();
    }
}
