<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationDetail extends Model
{
    use HasFactory;

    public function hotel()
    {
        $this->belongsTo(Hotel::class);
    }

    public function location()
    {
        return  $this->belongsTo(Location::class);
    }
}
