<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Client;
use App\Models\BedType;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Models\RoomFeatures;
use App\Models\EntityResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MultipleUploadController;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RoomTypes = RoomType::all();
        $BedTypes  = BedType::all();
        return view('HotelRooms.add_hotel_room', compact('RoomTypes', 'BedTypes'));
    }

    public function AllRooms()
    {
        $allRooms = Room::AllRooms();
        return view('HotelRooms.overall_hotel_rooms', compact('allRooms'));
    }

    public function ActiveRooms()
    {
        $allRooms = Room::ActiveRooms();
        return view('HotelRooms.active_hotel_rooms', compact('allRooms'));
    }

    public function InActiveRooms()
    {
        $allRooms = Room::InActiveRooms();
        return view('HotelRooms.InActive_hotel_rooms', compact('allRooms'));
    }

    public function SearchEngine( Request $request )
    {
        $allRooms = Room::SearchRooms($request->search);
        return view('HotelRooms.overall_hotel_rooms', compact('allRooms'));
    }

    public function FillRoomDetails( $id )
    {
        $RoomTypes = RoomType::all();
        $BedTypes  = BedType::all();

        $getRoomId = Room::find($id);
        $RoomTypeId   = RoomType::where('id', "=", $getRoomId->room_type_id)->first();
        $BedTypeId  = BedType::where('id', "=", $getRoomId->bed_type_id)->first();
        $EntityResources  = EntityResource::where('imageable_id', "=", $getRoomId->id)
                                          ->where('imageable_type', "=",'Hotel/Rooms')->get();

        return view('HotelRooms.edit_hotel_room_details', compact('getRoomId',
            'RoomTypeId', 'BedTypeId', 'EntityResources', 'RoomTypes', 'BedTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        \DB::transaction(function () use ( $request ) {

            $this->validate($request, [
                'room_title'  => 'required|max:40|string',
                'room_no'     => 'required|max:40|string',
                'room_size'   => 'required|max:20|string',
                'room_price'  => 'required|max:20',
                'description' => 'max:200',
                'status'      => 'required|max:30',
                'room_type'   => 'required|max:200',
                'bed_type'    => 'required|max:200',
            ]);

            $user     = Auth::user();
            $hotel_id = Hotel::where('user_id', "=", $user->id)->first();

            $rooms               = new Room();
            $rooms->room_title   = $request->room_title;
            $rooms->room_no      = $request->room_no;
            $rooms->room_size    = $request->room_size;
            $rooms->total_price  = $request->room_price;
            $rooms->description  = $request->description;
            $rooms->status       = $request->status;
            $rooms->room_type_id = $request->room_type;
            $rooms->bed_type_id  = $request->bed_type;
            $rooms->hotel_id     = $hotel_id->id;
            $rooms->save();

            MultipleUploadController::insertImages($request, $rooms->id, 'Hotel/Rooms', 'image1', '1');
            MultipleUploadController::insertImages($request, $rooms->id, 'Hotel/Rooms', 'image2', '2');
            MultipleUploadController::insertImages($request, $rooms->id, 'Hotel/Rooms', 'image3', '3');

            Session::flash('success', 'You Have Successfully Added a Room...');
        });

        return back();
    }

    public function update( Request $request, $id )
    {
        \DB::transaction(function () use ( $request, $id ) {

            $this->validate($request, [
                'room_title'  => 'required|max:40|string',
                'room_no'     => 'required|max:40|string',
                'room_size'   => 'required|max:20|string',
                'room_price'  => 'required|max:20',
                'description' => 'max:200',
                'status'      => 'required|max:30',
                'room_type'   => 'required|max:200',
                'bed_type'    => 'required|max:200',
            ]);

            $user     = Auth::user();
            $hotel_id = Hotel::where('user_id', "=", $user->id)->first();

            $rooms = Room::find($id);
            MultipleUploadController::updateImages($request, $rooms->id, 'Hotel/Rooms', 'image1', $request->imageName1, 1);
            MultipleUploadController::updateImages($request, $rooms->id, 'Hotel/Rooms', 'image2', $request->imageName2, 2);
            MultipleUploadController::updateImages($request, $rooms->id, 'Hotel/Rooms', 'image3', $request->imageName3, 3);

            $rooms->room_title   = $request->room_title;
            $rooms->room_no      = $request->room_no;
            $rooms->room_size    = $request->room_size;
            $rooms->total_price  = $request->room_price;
            $rooms->description  = $request->description;
            $rooms->status       = $request->status;
            $rooms->room_type_id = $request->room_type;
            $rooms->bed_type_id  = $request->bed_type;
            $rooms->hotel_id     = $hotel_id->id;
            $rooms->save();

            Session::flash('success', 'You Have Successfully Updated Room Details...');
        });

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy( $id )
    {
        //
    }
}
