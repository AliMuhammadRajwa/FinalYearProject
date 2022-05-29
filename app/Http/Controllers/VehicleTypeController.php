<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Transportation.VehicleType.add_vehicle_type');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicleType = new VehicleType();
        $vehicleType->title = $request->vehicle_title;
        $vehicleType->save();
        Session::flash('success','You have Succesfully Added a Vehicle Type');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function editVehicleType($id)
    {
        $vehicleTypeTitle = VehicleType::findOrFail($id);
        return view('Transportation.VehicleType.edit_vehicle_type',compact('vehicleTypeTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicleType =VehicleType::findOrFail($id);
        $vehicleType->title = $request->vehicle_title;
        $vehicleType->save();
        Session::flash('success','You have Succesfully updated vehicle Type');
        return redirect(route('list.vehicle.title.type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allVehicleTypes()
    {
        $vehicleTypes = VehicleType::all();
        return view('Transportation.VehicleType.all_vehile_type',compact('vehicleTypes'));
    }

    public function destroy($id)
    {
        VehicleType::destroy($id);
        Session::flash('success','You have Sucessfully Deleted the Vehicle Type');
        return back();

    }
}
