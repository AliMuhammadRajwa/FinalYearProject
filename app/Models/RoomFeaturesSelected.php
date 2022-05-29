<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFeaturesSelected extends Model
{
    use HasFactory;

    public function room_reservation()
    {
        return $this->belongsTo(RoomReservation::class);
    }

    public function room_features()
    {
        return $this->belongsTo(RoomFeatures::class);
    }
}
