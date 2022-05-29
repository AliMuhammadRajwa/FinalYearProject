<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\ReservedRooms;
use App\Models\EntityResource;
use App\Models\RoomReservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCustomers = Client::AllCustomers();
        $allRooms     = Room::AllRoomsInActive();
        return view('Reservations.new_reservation', compact('allCustomers', 'allRooms'));
    }

    public function AllReservations()
    {
        $allReservations = RoomReservation::AllReservations();
        return view('Reservations.all_reservations', compact('allReservations'));
    }

    public function ActiveReservations()
    {
        $allReservations = RoomReservation::ActiveReservations();
        return view('Reservations.active_reservations', compact('allReservations'));
    }

    public function SearchEngine( Request $request )
    {
        $allReservations = RoomReservation::SearchReservations($request->search);
        return view('Reservations.all_reservations', compact('allReservations'));
    }


    public function HotelCheckOutDetails()
    {
        $allReservations = RoomReservation::AllReservations()->unique();
        return view('Reservations.customer_check_out_details', compact('allReservations'));
    }


    public function FillRerservationDetails( $id, $room_id, $client_id )
    {
        $allCustomers = Client::AllCustomers();
        $allRooms     = Room::AllRoomsInActive();

        $getReservationId = RoomReservation::find($id);
        $RoomId           = Room::where('id', "=", $room_id)->firstOrFail();
        $ClientId         = Client::where('id', "=", $client_id)->firstOrFail();

        $checkInDateTime  = RoomReservation::getDateTimeAttribute($getReservationId->check_in_date_time);
        $checkOutDateTime = RoomReservation::getDateTimeAttribute($getReservationId->check_out_date_time);

        return view('Reservations.edit_reservation_details', compact('getReservationId', 'RoomId', 'ClientId', 'allCustomers', 'allRooms', 'checkInDateTime', 'checkOutDateTime'));
    }


    function CustomerReservedRooms( $reservation_id, $client_id )
    {
        $RoomId = ReservedRooms::join('rooms', 'rooms.id', '=', 'reserved_rooms.room_id')
                               ->join('room_reservations', 'room_reservations.id', '=', 'reserved_rooms.room_reservation_id')
                               ->join('clients', 'clients.id', '=', 'reserved_rooms.client_id')
                               ->where('reserved_rooms.room_reservation_id', "=", $reservation_id)
                               ->where('reserved_rooms.client_id', "=", $client_id);

        return $RoomId;
    }

    public function FillCustomerCheckOutDetails( $id, $client_id )
    {

        $getReservationId = RoomReservation::find($id);
        $ClientId         = Client::where('id', "=", $client_id)->firstOrFail();

        $RoomId = ReservationController::CustomerReservedRooms($getReservationId->id, $ClientId->id)
                                       ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.total_price', 'rooms.status' ]);

        $totalAmountDB = ReservationController::CustomerReservedRooms($getReservationId->id, $ClientId->id)
                                              ->sum('rooms.total_price');


        $checkInDateTime  = RoomReservation::getDateTimeAttribute($getReservationId->check_in_date_time);
        $checkOutDateTime = RoomReservation::getDateTimeAttribute($getReservationId->check_out_date_time);

        return view('Reservations.add_check_out_payment', compact('getReservationId', 'ClientId', 'RoomId', 'checkInDateTime', 'checkOutDateTime', 'totalAmountDB'));
    }
    public function PrintCustomerCheckOutDetails( $id, $client_id )
    {

        $getReservationId = RoomReservation::find($id);
        $ClientId         = Client::where('id', "=", $client_id)->firstOrFail();

        $RoomId = ReservationController::CustomerReservedRooms($getReservationId->id, $ClientId->id)
                                       ->get([ 'rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.total_price', 'rooms.status' ]);

        $totalAmountDB = ReservationController::CustomerReservedRooms($getReservationId->id, $ClientId->id)
                                              ->sum('rooms.total_price');


        $checkInDateTime  = RoomReservation::getDateTimeAttribute($getReservationId->check_in_date_time);
        $checkOutDateTime = RoomReservation::getDateTimeAttribute($getReservationId->check_out_date_time);

        return view('Reservations.print_check_out_payment', compact('getReservationId', 'ClientId', 'RoomId', 'checkInDateTime', 'checkOutDateTime', 'totalAmountDB'));
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
                'check_in_date_time'  => 'required|max:50|string',
                'check_out_date_time' => 'required|max:50|string',
                'no_of_adults'        => 'required|max:20|string',
                'no_of_childs'        => 'required|max:20',
                'no_of_rooms'         => 'required|max:20',
                'description'         => 'max:200',

            ]);

            $hotel_id = Hotel::where('user_id', "=", Auth::user()->id)->firstOrFail();

            $reservation                      = new RoomReservation();
            $reservation->check_in_date_time  = $request->check_in_date_time;
            $reservation->check_out_date_time = $request->check_out_date_time;
            $reservation->no_of_adults        = $request->no_of_adults;
            $reservation->no_of_childs        = $request->no_of_childs;
            $reservation->no_of_rooms         = $request->no_of_rooms;
            $reservation->description         = $request->description;
            $reservation->status              = $request->status;
            $reservation->hotel_id            = $hotel_id->id;
            $reservation->save();


            //*****************************************************
            $ActiveCustomer           = Client::find($request->customer_cnic);
            $ActiveCustomer->isActive = '1';
            $ActiveCustomer->save();

            //*****************************************************
            $counter = collect($request->room_title);

            for ( $count = 0; $count < $counter->count(); $count++ ) {

                $room_id = Room::where('id', "=", $request->room_title[$count])
                               ->where('hotel_id', "=", $hotel_id->id)->firstOrFail();

                $reservedRooms                      = new ReservedRooms();
                $reservedRooms->client_id           = $request->customer_cnic;
                $reservedRooms->room_id             = $room_id->id;
                $reservedRooms->room_reservation_id = $reservation->id;
                $reservedRooms->save();


                //*****************************************************
                $rooms         = Room::find($room_id->id);
                $rooms->status = '1';
                $rooms->save();
            }

            Session::flash('success', 'You Have Successfully Added a Reservation...');
        });

        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        \DB::transaction(function () use ( $request, $id ) {

            $this->validate($request, [
                'check_in_date_time'  => 'required|max:50|string',
                'check_out_date_time' => 'required|max:50|string',
                'no_of_adults'        => 'required|max:20|string',
                'no_of_childs'        => 'required|max:20',
                'no_of_rooms'         => 'required|max:20',
                'description'         => 'max:200',
            ]);

            $hotel_id = Hotel::where('user_id', "=", Auth::user()->id)->firstOrFail();

            $reservation                      = RoomReservation::find($id);
            $reservation->check_in_date_time  = $request->check_in_date_time;
            $reservation->check_out_date_time = $request->check_out_date_time;
            $reservation->no_of_adults        = $request->no_of_adults;
            $reservation->no_of_childs        = $request->no_of_childs;
            $reservation->no_of_rooms         = $request->no_of_rooms;
            $reservation->description         = $request->description;
            $reservation->status              = $request->status;
            $reservation->hotel_id            = $hotel_id->id;
            $reservation->save();


            //*****************************************************
            $roomsReservedPrevious         = Room::find($request->reserved_room_id);
            $roomsReservedPrevious->status = '0';
            $roomsReservedPrevious->save();


            //*****************************************************
            $reservedRoomsId_db = ReservedRooms::where('room_id', "=", $request->reserved_room_id)
                                               ->where('client_id', "=", $request->client_id)
                                               ->where('room_reservation_id', "=", $reservation->id)->firstOrFail();

            $reservedRooms            = ReservedRooms::find($reservedRoomsId_db->id);
            $reservedRooms->room_id   = $request->room_id;
            $reservedRooms->client_id = $request->client_id;
            $reservedRooms->save();


            //*****************************************************
            $room_id = Room::where('id', "=", $request->room_id)
                           ->where('hotel_id', "=", $hotel_id->id)->firstOrFail();

            $roomsNow         = Room::find($room_id->id);
            $roomsNow->status = '1';
            $roomsNow->save();
            //*****************************************************

            Session::flash('success', 'You Have Successfully Added a Reservation...');
        });

        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
    }
}
