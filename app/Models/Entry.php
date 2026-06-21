<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'vehicle_id', 'user_id', 'entry_date', 
        'estimated_delivery', 'total_value', 'status'
    ];

    protected $casts = [
        'entry_date' => 'datetime',
        'estimated_delivery' => 'datetime',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('price')->withTimestamps();
    }
}
