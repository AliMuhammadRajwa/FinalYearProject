<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportReservation extends Model
{
    use HasFactory;

    public function transportreservation()
    {
        return $this->belongsTo(TransportCompanyDetails::class);
    }

    public function entity_resource()
    {
        return $this->morphMany('App\EntityResource', 'imageable');
    }
}
