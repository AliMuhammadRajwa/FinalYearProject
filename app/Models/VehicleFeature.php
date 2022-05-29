<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleFeature extends Model
{
    use HasFactory;

    public function vehicletype()
    {
        return $this->belongsTo(VehicleType::class);
    }
    public function transportfeaturetitle()
    {
        return $this->belongsTo(TransportFeatureTitle::class);
    }

    public function entity_resource()
    {
        return $this->morphMany('App\EntityResource', 'imageable');
    }
}
