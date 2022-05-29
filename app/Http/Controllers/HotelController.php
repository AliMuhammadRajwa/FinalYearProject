<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use App\Models\Client;
use App\Models\Country;
use App\Models\Province;
use App\Models\EntityResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MultipleUploadController;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('Hotels.add_hotels', compact('countries'));
    }

    public function HotelDetails()
    {
        $hotelDetails = Hotel::HotelDetails();
        return view('Hotels.hotel_details', compact('hotelDetails'));
    }

    public function SearchEngine( Request $request )
    {
        $hotelDetails = Hotel::SearchHotels($request->search);
        return view('Hotels.hotel_details', compact('hotelDetails'));
    }

    public function FillHotelDetails( $id )
    {
        $countries       = Country::all();

        $getHotelId      = Hotel::find($id);
        $CountryId       = Country::where('id', "=", $getHotelId->country_id)->firstOrFail();
        $ProvinceId      = Province::where('id', "=", $getHotelId->province_id)->firstOrFail();
        $CityId          = City::where('id', "=", $getHotelId->city_id)->firstOrFail();

        $EntityResources = EntityResource::where('imageable_id', "=", $getHotelId->id)
                                         ->where('imageable_type', "=", 'Hotel/HotelImages')->get();

        return view('Hotels.edit_hotel_details', compact('getHotelId', 'CountryId', 'ProvinceId', 'CityId', 'EntityResources', 'countries'));
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
                'hotel_name'        => 'required|max:40|string',
                'hotel_address'     => 'required|string',
                'hotel_contact'     => 'required|max:11',
                'country_id'        => 'required|max:200',
                'province_id'       => 'required|max:30',
                'city_id'           => 'required|max:200',
                'hotel_web'         => 'string',
                'hotel_facebook'    => 'string',
                'hotel_email'       => 'required|max:80|email|unique:users,email',
                'hotel_description' => 'max:500',
                'status'            => 'required|max:30',
            ]);

            $hotel               = new Hotel();
            $hotel->hotel_title  = $request->hotel_name;
            $hotel->hotel_code   = Str::random(10);
            $hotel->address      = $request->hotel_address;
            $hotel->contact_no   = $request->hotel_contact;
            $hotel->email        = $request->hotel_email;
            $hotel->website_url  = $request->hotel_web;
            $hotel->facebook_url = $request->hotel_facebook;
            $hotel->description  = $request->hotel_description;
            $hotel->status       = $request->status;
            $hotel->country_id   = $request->country_id;
            $hotel->province_id  = $request->province_id;
            $hotel->city_id      = $request->city_id;
            $hotel->user_id      = Auth::user()->id;
            $hotel->save();

            MultipleUploadController::insertImages($request, $hotel->id, 'Hotel/HotelImages', 'logo', '1');
            MultipleUploadController::insertImages($request, $hotel->id, 'Hotel/HotelImages', 'image1', '2');
            MultipleUploadController::insertImages($request, $hotel->id, 'Hotel/HotelImages', 'image2', '3');

            Session::flash('success', 'You Have Successfully Added a Hotel');
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
                'hotel_name'        => 'required|max:40|string',
                'hotel_address'     => 'required|string',
                'hotel_contact'     => 'required|max:11',
                'country_id'        => 'required|max:200',
                'province_id'       => 'required|max:30',
                'city_id'           => 'required|max:200',
                'hotel_web'         => 'string',
                'hotel_facebook'    => 'string',
                'hotel_email'       => 'required|max:80|email|unique:users,email',
                'hotel_description' => 'max:500',
                'status'            => 'required|max:30',
            ]);

            $hotel = Hotel::find($id);

            MultipleUploadController::updateImages($request, $hotel->id, 'Hotel/HotelImages', 'logo', $request->imageName1, 1);
            MultipleUploadController::updateImages($request, $hotel->id, 'Hotel/HotelImages', 'image1', $request->imageName2, 2);
            MultipleUploadController::updateImages($request, $hotel->id, 'Hotel/HotelImages', 'image2', $request->imageName3, 3);


            $hotel->hotel_title  = $request->hotel_name;
            $hotel->hotel_code   = Str::random(10);
            $hotel->address      = $request->hotel_address;
            $hotel->contact_no   = $request->hotel_contact;
            $hotel->email        = $request->hotel_email;
            $hotel->website_url  = $request->hotel_web;
            $hotel->facebook_url = $request->hotel_facebook;
            $hotel->description  = $request->hotel_description;
            $hotel->status       = $request->status;
            $hotel->country_id   = $request->country_id;
            $hotel->province_id  = $request->province_id;
            $hotel->city_id      = $request->city_id;
            $hotel->user_id      = Auth::user()->id;
            $hotel->save();

            Session::flash('success', 'You Have Successfully Added a Hotel');
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
