<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    use HasFactory;

    public static function getDateTimeAttribute( $value )
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }


    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }

    public function scopeAllReservations()
    {
        $allReservations = RoomReservation::join('reserved_rooms', 'room_reservations.id', '=', 'reserved_rooms.room_reservation_id')
                                          ->join('clients', 'clients.id', '=', 'reserved_rooms.client_id')
                                          ->join('rooms', 'rooms.id', '=', 'reserved_rooms.room_id')
                                          ->join('hotels', 'hotels.id', '=', 'room_reservations.hotel_id')
                                          ->join('users', 'users.id', '=', 'hotels.user_id')
                                          ->where('users.id', '=', Auth::user()->id)
                                          ->get([ 'room_reservations.id', 'clients.id as client_id', 'clients.first_name', 'clients.last_name', 'clients.cnic',
                                                  'clients.cnic', 'rooms.id as room_id', 'rooms.room_title', 'room_reservations.check_in_date_time',
                                                  'room_reservations.check_out_date_time', 'room_reservations.no_of_adults', 'room_reservations.no_of_childs',
                                                  'room_reservations.no_of_rooms', 'room_reservations.description', 'room_reservations.status' ]);

        return $allReservations;
    }

    public function scopeActiveReservations( $query )
    {
        $allReservations = RoomReservation::join('reserved_rooms', 'room_reservations.id', '=', 'reserved_rooms.room_reservation_id')
                                          ->join('clients', 'clients.id', '=', 'reserved_rooms.client_id')
                                          ->join('rooms', 'rooms.id', '=', 'reserved_rooms.room_id')
                                          ->join('hotels', 'hotels.id', '=', 'room_reservations.hotel_id')
                                          ->join('users', 'users.id', '=', 'hotels.user_id')
                                          ->where('users.id', '=', Auth::user()->id)
                                          ->where('room_reservations.status', '=', '1')
                                          ->get([ 'room_reservations.id', 'clients.id as client_id', 'clients.first_name', 'clients.last_name', 'clients.cnic',
                                                  'rooms.id as room_id', 'rooms.room_title', 'room_reservations.check_in_date_time',
                                                  'room_reservations.check_out_date_time', 'room_reservations.no_of_adults', 'room_reservations.no_of_childs',
                                                  'room_reservations.no_of_rooms', 'room_reservations.description', 'room_reservations.status' ]);

        return $allReservations;
    }

    public function scopeSearchReservations( $query, $search )
    {
        $allReservations = RoomReservation::join('reserved_rooms', 'room_reservations.id', '=', 'reserved_rooms.room_reservation_id')
                                          ->join('clients', 'clients.id', '=', 'reserved_rooms.client_id')
                                          ->join('rooms', 'rooms.id', '=', 'reserved_rooms.room_id')
                                          ->join('hotels', 'hotels.id', '=', 'room_reservations.hotel_id')
                                          ->join('users', 'users.id', '=', 'hotels.user_id')
                                          ->where('users.id', '=', Auth::user()->id)
                                          ->where(function ( $models ) use ( $search ) {
                                              $models->where('room_reservations.id', 'like', '%' . $search . '%')
                                                     ->orwhere('room_reservations.check_in_date_time', 'like', '%' . $search . '%')
                                                     ->orwhere('room_reservations.check_out_date_time', 'like', '%' . $search . '%')
                                                     ->orwhere('clients.first_name', 'like', '%' . $search . '%')
                                                     ->orwhere('clients.last_name', 'like', '%' . $search . '%')
                                                     ->orwhere('rooms.room_title', 'like', '%' . $search . '%')
                                                     ->orwhere('rooms.room_no', 'like', '%' . $search . '%')
                                                     ->orwhere('room_reservations.status', 'like', '%' . $search . '%');
                                          })
                                          ->select('room_reservations.id', 'clients.id as client_id', 'clients.first_name', 'clients.last_name', 'clients.cnic',
                                              'rooms.id as room_id', 'rooms.room_title', 'room_reservations.check_in_date_time',
                                              'room_reservations.check_out_date_time', 'room_reservations.no_of_adults', 'room_reservations.no_of_childs',
                                              'room_reservations.no_of_rooms', 'room_reservations.description', 'room_reservations.status')->get();

        return $allReservations;
    }
}
