<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function bed_type()
    {
        return $this->belongsTo(BedType::class);
    }

    public function entity_resource()
    {
        return $this->morphMany('App\EntityResource', 'imageable');
    }

    public function scopeAllRoomsInActive( $query )
    {
        $allRooms = Room::join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
                        ->join('users', 'users.id', '=', 'hotels.user_id')
                        ->where('users.id', '=', Auth::user()->id)
                        ->where('rooms.status', '=', '0')
                        ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no']);
        return $allRooms;
    }

    public function scopeAllRooms( $query )
    {
        $allRooms = Room::join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
                        ->join('bed_types', 'bed_types.id', '=', 'rooms.bed_type_id')
                        ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
                        ->join('users', 'users.id', '=', 'hotels.user_id')
                        ->where('users.id', '=', Auth::user()->id)
                        ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.room_size', 'rooms.total_price',
                                'rooms.description', 'rooms.status', 'room_types.room_type', 'bed_types.bed_type' ]);

        return $allRooms;
    }

    public function scopeActiveRooms( $query )
    {
        $allRooms = Room::join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
                        ->join('bed_types', 'bed_types.id', '=', 'rooms.bed_type_id')
                        ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
                        ->join('users', 'users.id', '=', 'hotels.user_id')
                        ->where('users.id', '=', Auth::user()->id)
                        ->where('rooms.status', '=', '1')
                        ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.room_size', 'rooms.total_price',
                                'rooms.description', 'rooms.status', 'room_types.room_type', 'bed_types.bed_type' ]);

        return $allRooms;
    }

    public function scopeInActiveRooms( $query )
    {
        $allRooms = Room::join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
                        ->join('bed_types', 'bed_types.id', '=', 'rooms.bed_type_id')
                        ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
                        ->join('users', 'users.id', '=', 'hotels.user_id')
                        ->where('users.id', '=', Auth::user()->id)
                        ->where('rooms.status', '=', '0')
                        ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.room_size', 'rooms.total_price',
                                'rooms.description', 'rooms.status', 'room_types.room_type', 'bed_types.bed_type' ]);

        return $allRooms;
    }

    public function scopeSearchRooms( $query, $search )
    {
        $allRooms = Room::join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
                        ->join('bed_types', 'bed_types.id', '=', 'rooms.bed_type_id')
                        ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
                        ->join('users', 'users.id', '=', 'hotels.user_id')
                        ->where('users.id', '=', Auth::user()->id)
                        ->where(function ( $models ) use ( $search ) {
                            $models->where('rooms.id', 'like', '%' . $search . '%')
                                   ->orwhere('room_title', 'like', '%' . $search . '%')
                                   ->orwhere('room_no', 'like', '%' . $search . '%')
                                   ->orwhere('room_type', 'like', '%' . $search . '%')
                                   ->orwhere('bed_type', 'like', '%' . $search . '%')
                                   ->orwhere('rooms.status', 'like', '%' . $search . '%');
                        })
                        ->select('rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.room_size', 'rooms.total_price',
                            'rooms.description', 'rooms.status', 'room_types.room_type', 'bed_types.bed_type')->get();

        return $allRooms;
    }
}
