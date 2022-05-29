<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedRooms extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function roomReservation()
    {
        return $this->belongsTo(RoomReservation::class);
    }

//    public function scopeCustomerReservedRooms( $reservation_id, $client_id )
//    {
//        $ReservedRooms = ReservedRooms::join('rooms', 'rooms.id', '=', 'reserved_rooms.room_id')
//                                      ->join('room_reservations', 'room_reservations.id', '=', 'reserved_rooms.room_reservation_id')
//                                      ->join('clients', 'clients.id', '=', 'reserved_rooms.client_id')
//                                      ->where('reserved_rooms.room_reservation_id', "=", $getReservationId->id)
//                                      ->where('reserved_rooms.client_id', "=", $ClientId->id)
//                                      ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.total_price', 'rooms.status' ]);
//
//        return $ReservedRooms;
//    }
}
