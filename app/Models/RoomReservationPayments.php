<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReservationPayments extends Model
{
    use HasFactory;

    public function room_reservation()
    {
        return $this->belongsTo(RoomReservation::class);
    }

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }


    public function scopeAllReservationPayments( $query )
    {
        $allPaymentsDetails = RoomReservationPayments::join('room_reservations', 'room_reservations.id', '=', 'room_reservation_payments.room_reservation_id')
                            ->join('clients', 'clients.id', '=', 'room_reservation_payments.client_id')
                            ->join('rooms', 'rooms.id', '=', 'room_reservations.room_id')
                            ->join('hotels', 'hotels.id', '=', 'room_reservations.hotel_id')
                            ->join('users', 'users.id', '=', 'hotels.user_id')
                            ->where('users.id', '=', Auth::user()->id)
                            ->get([ 'clients.id', 'clients.first_name', 'clients.last_name', 'clients.cnic', 'clients.contact',
                                    'room_reservations.check_in_date_time', 'room_reservations.check_out_date_time', 'room_reservations.no_of_rooms',
                                    'rooms.room_title', 'rooms.room_no', 'rooms.total_price']);

        return $allPaymentsDetails;
    }
}
