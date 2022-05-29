<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\ReservedRooms;
use App\Models\RoomReservation;
use Illuminate\Support\Facades\Auth;
use App\Models\RoomReservationPayments;
use Illuminate\Support\Facades\Session;

class HotelPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        $allCustomers = Client::all();
        //        $allPaymentsDetails = RoomReservationPayments::AllReservationPayments();
        //        return view('HotelPayments.add_hotel_payment', compact('allCustomers'));
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

    function CustomerReservedRooms( $reservation_id, $client_id )
    {
        $RoomId = ReservedRooms::join('rooms', 'rooms.id', '=', 'reserved_rooms.room_id')
                               ->join('room_reservations', 'room_reservations.id', '=', 'reserved_rooms.room_reservation_id')
                               ->join('clients', 'clients.id', '=', 'reserved_rooms.client_id')
                               ->where('reserved_rooms.room_reservation_id', "=", $reservation_id)
                               ->where('reserved_rooms.client_id', "=", $client_id);

        return $RoomId;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request, $reservation_id, $client_id )
    {
        \DB::transaction(function () use ( $request, $reservation_id, $client_id ) {

            $this->validate($request, [
                'total_amount'    => 'required|max:50|string',
                'other_amount'    => 'required|max:50|string',
                'discount_amount' => 'required|max:20|string',
                'amount_due'      => 'required|max:20',
                'paid_amount'     => 'required|max:20',
                'credit_amount'   => 'required|max:20',
                'description'     => 'max:200',

            ]);

            $reservationPayment                      = new RoomReservationPayments();
            $reservationPayment->total_amount        = $request->total_amount;
            $reservationPayment->other_amount        = $request->other_amount;
            $reservationPayment->total_discount      = $request->discount_amount;
            $reservationPayment->amount_due          = $request->amount_due;
            $reservationPayment->paid_amount         = $request->paid_amount;
            $reservationPayment->amount_credit       = $request->credit_amount;
            $reservationPayment->description         = $request->description;
            $reservationPayment->room_reservation_id = $reservation_id;
            $reservationPayment->client_id           = $client_id;
            $reservationPayment->save();


            //*****************************************************
            $ActiveCustomer           = Client::find($client_id);
            $ActiveCustomer->isActive = '0';
            $ActiveCustomer->save();

            //*****************************************************

            $RoomReservationDb = HotelPaymentsController::CustomerReservedRooms($reservation_id, $client_id)
                                                        ->get([ 'room_reservations.id', 'rooms.id as room_id', 'rooms.room_title', 'rooms.room_no', 'rooms.total_price', 'rooms.status' ]);


            //            $counter = collect($RoomReservationDb);

            foreach ( $RoomReservationDb as $RoomReservation ) {

                $reservedRooms         = RoomReservation::find($RoomReservation->id);
                $reservedRooms->status = '0';
                $reservedRooms->save();


                //*****************************************************
                $rooms         = Room::find($RoomReservation->room_id);
                $rooms->status = '0';
                $rooms->save();
            }

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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
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
