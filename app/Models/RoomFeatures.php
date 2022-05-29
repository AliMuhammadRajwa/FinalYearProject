<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFeatures extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function featureTitle()
    {
        return $this->belongsTo(FeatureTitle::class);
    }

    public function scopeAllRoomFeatures( $query )
    {
        $allRooms = RoomFeatures::join('rooms', 'rooms.id', '=', 'room_features.room_id')
                                ->join('feature_titles', 'feature_titles.id', '=', 'room_features.feature_title_id')
                                ->get([ 'room_features.id', 'room_features.price', 'feature_titles.feature_title', 'rooms.room_title',
                                        'rooms.room_no', 'rooms.total_price' ]);

        return $allRooms;
    }

    public function scopeSearchRoomFeatures( $query, $search )
    {
        $allRooms = RoomFeatures::join('rooms', 'rooms.id', '=', 'room_features.room_id')
                                ->join('feature_titles', 'feature_titles.id', '=', 'room_features.feature_title_id')
                                ->where(function ( $models ) use ( $search ) {
                                    $models->where('rooms.id', 'like', '%' . $search . '%')
                                           ->orwhere('rooms.room_title', 'like', '%' . $search . '%')
                                           ->orwhere('rooms.room_no', 'like', '%' . $search . '%')
                                           ->orwhere('feature_titles.feature_title', 'like', '%' . $search . '%')
                                           ->orwhere('room_features.id', 'like', '%' . $search . '%');
                                })
                                ->select('room_features.id', 'room_features.price', 'feature_titles.feature_title', 'rooms.room_title',
                                    'rooms.room_no', 'rooms.total_price')->get();

        return $allRooms;
    }
}
