<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{

    protected $fillable = [
        'flight_number', 'origin', 'destination', 'departure_time', 'arrival_time'
    ];
    public function origin_airport()
    {
        return $this->belongsTo(Airport::class, 'origin');
    }

    public function destination_airport()
    {
        return $this->belongsTo(Airport::class, 'destination');
    }
}
