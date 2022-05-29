<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedVehicle extends Model
{
    use HasFactory;

    public function reservedvehicle()
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicledetail()
    {
        return $this->belongsTo(VehicleDetail::class);
    }

    public function transportreservation()
    {
        return $this->belongsTo(TransportReservation::class);
    }

    public function entity_resource()
    {
        return $this->morphMany('App\EntityResource', 'imageable');
    }
}
