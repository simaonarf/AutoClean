<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['owner_id', 'brand', 'model', 'year', 'color'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
