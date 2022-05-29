<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function entity_resource()
    {
        return $this->morphMany('App\EntityResource', 'imageable');
    }

//    public function scopeAllRooms( $query )
//    {
//        $hotelDetails = Hotel::join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
//                             ->join('bed_types', 'bed_types.id', '=', 'rooms.bed_type_id')
//                             ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
//                             ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.room_size', 'rooms.total_price',
//                                     'rooms.description', 'rooms.status', 'room_types.room_type', 'bed_types.bed_type' ]);
//
//        return $hotelDetails;
//    }

    public function scopeHotelDetails( $query )
    {
        $hotelDetails = Hotel::join('users', 'users.id', '=', 'hotels.user_id')
                             ->where('hotels.status', '=', '1')
                             ->where('users.id', '=', Auth::user()->id)
                             ->get([ 'hotels.id', 'hotels.hotel_title', 'hotels.hotel_code', 'hotels.contact_no', 'hotels.email',
                                     'hotels.website_url', 'hotels.facebook_url', 'hotels.description', 'hotels.status' ]);

        return $hotelDetails;
    }

    //    public function scopeInActiveRooms( $query )
    //    {
    //        $hotelDetails = Hotel::join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
    //                        ->join('bed_types', 'bed_types.id', '=', 'rooms.bed_type_id')
    //                        ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
    //                        ->where('rooms.status', '=', '0')
    //                        ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.room_size', 'rooms.total_price',
    //                                'rooms.description', 'rooms.status', 'room_types.room_type', 'bed_types.bed_type']);
    //
    //        return $hotelDetails;
    //    }

    public function scopeSearchHotels( $query, $search )
    {
        $hotelDetails = Hotel::join('users', 'users.id', '=', 'hotels.user_id')
                             ->where('hotels.status', '=', '1')
                             ->where(function ( $models ) use ( $search ) {
                                 $models->where('hotels.id', 'like', '%' . $search . '%')
                                        ->orwhere('hotel_title', 'like', '%' . $search . '%')
                                        ->orwhere('hotel_code', 'like', '%' . $search . '%')
                                        ->orwhere('contact_no', 'like', '%' . $search . '%')
                                        ->orwhere('email', 'like', '%' . $search . '%')
                                        ->orwhere('status', 'like', '%' . $search . '%');
                             })
                             ->where('user_id', '=', Auth::user()->id)
                             ->select('hotels.id', 'hotels.hotel_title', 'hotels.hotel_code', 'hotels.contact_no', 'hotels.email',
                                 'hotels.website_url', 'hotels.facebook_url', 'hotels.description', 'hotels.status')->get();

        return $hotelDetails;
    }
}
