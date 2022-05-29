<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Gender;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\CompanyDriver;
use App\Models\EntityResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use File;
use App\Models\TransportCompanyDetails;

class CompanyDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $genders   = Gender::all();
        return view('Transportation.Drivers.add_driver_detail', compact('countries', 'genders'));
    }

    public function allDrivers()
    {
        $allCompanyDrivers = CompanyDriver::AllCompanyDrivers();
        return view('Transportation.Drivers.drivers_details', compact('allCompanyDrivers'));
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
                'driver_first_name' => 'required|max:40|string',
                'driver_last_name'  => 'required|max:40|string',
                'driver_cnic'       => 'required|max:13|unique:company_drivers,cnic',
                'driver_contact'    => 'required|max:13|unique:company_drivers,contact_no',
                'driver_email'      => 'required|max:80|unique:company_drivers,email|unique:users,email',
                'driver_address'    => 'required|max:200',

            ]);
            $user                         = Auth::user();
            $transport_company_details_id = TransportCompanyDetails::where('user_id', "=", $user->id)->firstOrFail();

            $driver                               = new CompanyDriver();
            $driver->first_name                   = $request->driver_first_name;
            $driver->last_name                    = $request->driver_last_name;
            $driver->cnic                         = $request->driver_cnic;
            $driver->contact_no                   = $request->driver_contact;
            $driver->email                        = $request->driver_email;
            $driver->address                      = $request->driver_address;
            $driver->gender_id                    = $request->gender_id;
            $driver->country_id                   = $request->country_id;
            $driver->province_id                  = $request->province_id;
            $driver->city_id                      = $request->city_id;
            $driver->status                       = '1';
            $driver->transport_company_details_id = $transport_company_details_id->id;
            $driver->save();

            MultipleUploadController::insertImages($request, $driver->id, 'Company/DriverImages', 'driver_image', '1');
            MultipleUploadController::InsertEntityRelations($request, $driver->id, 'Company/Drivers', Auth::user()->id);
            Session::flash('success', 'You Have Successfully Added a Driver');
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
        $countries = Country::all();
        $provinces = Province::all();
        $cities    = City::all();
        $genders   = Gender::all();

        $driver          = CompanyDriver::findOrFail($id);
        $CountryId       = Country::where('id', "=", $driver->country_id)->first();
        $ProvinceId      = Province::where('id', "=", $driver->province_id)->first();
        $CityId          = City::where('id', "=", $driver->city_id)->first();
        $genderId        = Gender::where('id', "=", $driver->gender_id)->first();
        $EntityResources = EntityResource::where('imageable_id', "=", $driver->id)
                                         ->where('imageable_type', "=", 'Company/DriverImages')->get();


        return view('Transportation.Drivers.edit_driver_detail', compact('driver', 'countries', 'provinces', 'cities', 'genders', 'CountryId', 'ProvinceId', 'CountryId', 'CityId', 'genderId', 'EntityResources'));

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
                'driver_first_name' => 'required|max:40|string',
                'driver_last_name'  => 'required|max:40|string',
                'driver_cnic'       => 'required|max:13',
                'driver_contact'    => 'required|max:13',
                'driver_email'      => 'required|max:80',
                'driver_address'    => 'required|max:200',

            ]);

            $driver = CompanyDriver::findOrFail($id);
            MultipleUploadController::updateImages($request, $driver->id, 'Company/DriverImages', 'image', $request->imageName, 1);

            $driver->first_name  = $request->driver_first_name;
            $driver->last_name   = $request->driver_last_name;
            $driver->address     = $request->driver_address;
            $driver->gender_id   = $request->gender_id;
            $driver->country_id  = $request->country_id;
            $driver->province_id = $request->province_id;
            $driver->city_id     = $request->city_id;
            $driver->status      = $request->status;
            $driver->save();

        });
        Session::flash('success', 'You Have Successfully Updated a Driver');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $deleteDriver = CompanyDriver::find($id);
        $entityresource       = EntityResource::where('imageable_id', "=", $deleteDriver->id)
                                              ->where('imageable_type', '=', 'Company/DriverImages')
                                              ->firstOrFail();

        $image_path   = public_path() . '/img/' . $deleteDriver->image;
        File::delete($image_path);
        $entityresource->delete();
        $deleteDriver->delete();
        return back();
    }
}
