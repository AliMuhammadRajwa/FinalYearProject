<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\RoomFeatures;
use App\Models\FeatureTitle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoomFeaturesController extends Controller
{

    public function FeaturesTitleView()
    {
        return view('SuperAdmin.FeaturesTitle.feature_title');
    }

    public function RoomFeaturesView()
    {
        $hotel_id         = Hotel::where('user_id', "=", Auth::user()->id)->firstOrFail();
        $allRooms         = Room::where('hotel_id', '=', $hotel_id->id)->get();
        $allFeaturesTitle = FeatureTitle::where('hotel_id', '=', $hotel_id->id)->get();

        return view('HotelRooms.room_features', compact('allRooms', 'allFeaturesTitle'));
    }

    public function FillRoomFeaturesDetails( $id )
    {
        $allRooms         = Room::all();
        $allFeatureTitles = FeatureTitle::all();

        $getRoomFeaturesId   = RoomFeatures::find($id);
        $allRoomsId          = Room::where('id', '=', $getRoomFeaturesId->room_id)->firstOrFail();
        $allFeaturesTitlesId = FeatureTitle::where('id', '=', $getRoomFeaturesId->feature_title_id)->firstOrFail();

        return view('HotelRooms.edit_room_features', compact('getRoomFeaturesId', 'allRooms', 'allFeaturesTitlesId', 'allRoomsId', 'allRooms', 'allFeatureTitles'));
    }

    public function AllFeatures()
    {
        $allRoomFeatures = RoomFeatures::AllRoomFeatures();
        return view('HotelRooms.all_features', compact('allRoomFeatures'));
    }

    public function SearchRoomsFeatures( Request $request )
    {
        $allRoomFeatures = RoomFeatures::SearchRoomFeatures($request->search);
        return view('HotelRooms.all_features', compact('allRoomFeatures'));
    }

    public function store( Request $request )
    {
        \DB::transaction(function () use ( $request ) {

            $this->validate($request, [
                'feature_price' => 'required|max:20',
            ]);

            $hotel_id = Hotel::where('user_id', "=", Auth::user()->id)->firstOrFail();

            $room_id = Room::where('id', "=", $request->room_id)
                           ->where('hotel_id', "=", $hotel_id->id)->firstOrFail();

            $counter = collect($request->feature_price);

            for ( $count = 0; $count < $counter->count(); $count++ ) {
                $feature_title_id = FeatureTitle::where('id', "=", $request->feature_title[$count])
                                                ->where('hotel_id', "=", $hotel_id->id)->firstOrFail();

                $roomFeatures                   = new RoomFeatures();
                $roomFeatures->price            = $request->feature_price[$count];
                $roomFeatures->feature_title_id = $feature_title_id->id;
                $roomFeatures->room_id          = $room_id->id;
                $roomFeatures->save();
            }

            Session::flash('success', 'You Have Successfully Added Room Features...');
        });

        return back();
    }

    public function update( Request $request, $id )
    {
        \DB::transaction(function () use ( $request, $id ) {

            $this->validate($request, [
                'feature_id' => 'required|max:20',
                'room_id' => 'required|max:20',
                'feature_price' => 'required|max:20',
            ]);

            $roomFeatures = RoomFeatures::find($id);
            $roomFeatures->price            = $request->feature_price;
            $roomFeatures->feature_title_id = $request->feature_id;
            $roomFeatures->room_id          = $request->room_id;
            $roomFeatures->save();

            Session::flash('success', 'You Have Successfully updated Room Feature...');
        });

        return back();
    }

    public function storeFeatureTitles( Request $request )
    {
        \DB::transaction(function () use ( $request ) {

            $this->validate($request, [
                'feature_title' => 'required|max:50',
            ]);

            $hotel_id = Hotel::where('user_id', "=", Auth::user()->id)->first();

            $FeaturesTitle                = new FeatureTitle();
            $FeaturesTitle->feature_title = $request->feature_title;
            $FeaturesTitle->hotel_id      = $hotel_id->id;
            $FeaturesTitle->save();

            Session::flash('success', 'You Have Successfully Added a Room...');
        });

        return back();
    }

    public function destory( $id )
    {
        $roomFeatures     = RoomFeatures::find($id);
        $roomFeatures->delete();
        return back();
    }
}
