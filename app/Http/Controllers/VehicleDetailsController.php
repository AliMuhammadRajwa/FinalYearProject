<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;
use App\Models\VehicleDetail;
use App\Models\EntityResource;
use Illuminate\Support\Facades\Session;
use File;

class VehicleDetailsController extends Controller
{
    public function VehicleDetailsView()
    {
        $vehicletypes = VehicleType::all();
        return view('Transportation.Vehicles.add_vehicle_details ', compact('vehicletypes'));
    }

    public function StoreVehicleDetails( Request $request )
    {
        \DB::transaction(/**
         * @throws \Illuminate\Validation\ValidationException
         */ function () use ( $request ) {

            $this->validate($request, [
                'vehicle_title'       => 'required|max:40|string',
                'vehicle_no'          => 'string',
                'model'               => 'string',
                'color'               => 'required|max:50',
                'tracker_no'          => 'string',
                'vehicle_condition'   => 'string',
                'vehicle_type'        => 'max:30',
                'vehicle_description' => 'max:500',
                'status'              => 'required|max:20',
            ]);

            $vehicle                  = new VehicleDetail();
            $vehicle->vehicle_title   = $request->vehicle_title;
            $vehicle->vehicle_no      = $request->vehicle_no;
            $vehicle->model           = $request->model;
            $vehicle->color           = $request->color;
            $vehicle->tracker_no      = $request->tracker_no;
            $vehicle->condition       = $request->vehicle_condition;
            $vehicle->vehicle_type_id = $request->vehicle_type;
            $vehicle->description     = $request->vehicle_description;
            $vehicle->IsActive        = $request->status;
            $vehicle->save();

            MultipleUploadController::insertImages($request, $vehicle->id, 'Vehicle/VehicleImages', 'logo', '1');
            MultipleUploadController::insertImages($request, $vehicle->id, 'Vehicle/VehicleImages', 'image1', '2');
            MultipleUploadController::insertImages($request, $vehicle->id, 'Vehicle/VehicleImages', 'image2', '3');

            Session::flash('success', 'You Have Successfully Added a Hotel');
        });

        return back();
    }

    public function AllVehicleDetails()
    {
        $vehicleDetails = VehicleDetail::all();
        return view('Transportation.Vehicles.all_vehicle_details', compact('vehicleDetails'));
    }

    public function FillVehicleDetails( $id )
    {
        $vehicletypes     = VehicleType::all();
        $getVehicleDetailsId    = VehicleDetail::find($id);
        $vehicletypeId   = VehicleType::where('id', "=", $getVehicleDetailsId->vehicle_type_id)->first();
        $EntityResources = EntityResource::where('imageable_id', "=", $getVehicleDetailsId->id)
                                         ->where('imageable_type', "=", 'Vehicle/VehicleImages')->get();

        return view('Transportation.Vehicles.eidit_vehicle_details', compact('vehicletypes',
            'getVehicleDetailsId', 'vehicletypeId', 'EntityResources'));


    }

    public function Destroy( $id )
    {
        $deletevehicledetails = VehicleDetail::find($id);
        $image_path           = public_path() . '/img/' . $deletevehicledetails->image;
        File::delete($image_path);
        $deletevehicledetails->delete();
        return back();
    }

    public function Update( Request $request, $id )
    {
        \DB::transaction(function () use ( $request, $id ) {

            $this->validate($request, [
                'vehicle_title'       => 'required|max:40|string',
                'vehicle_no'          => 'string',
                'model'               => 'string',
                'color'               => 'required|max:50',
                'tracker_no'          => 'string',
                'vehicle_condition'   => 'string',
                'vehicle_type'        => 'max:30',
                'vehicle_description' => 'max:500',
                'status'              => 'required|max:20',
            ]);

            $vehicle = VehicleDetail::find($id);

            $vehicle->vehicle_title   = $request->vehicle_title;
            $vehicle->vehicle_no      = $request->vehicle_no;
            $vehicle->model           = $request->model;
            $vehicle->color           = $request->color;
            $vehicle->tracker_no      = $request->tracker_no;
            $vehicle->condition       = $request->vehicle_condition;
            $vehicle->vehicle_type_id = $request->vehicle_type;
            $vehicle->description     = $request->vehicle_description;
            $vehicle->IsActive        = $request->status;
            $vehicle->save();

            MultipleUploadController::insertImages($request, $vehicle->id, 'Vehicle/VehicleImages', 'logo', '1');
            MultipleUploadController::insertImages($request, $vehicle->id, 'Vehicle/VehicleImages', 'image1', '2');
            MultipleUploadController::insertImages($request, $vehicle->id, 'Vehicle/VehicleImages', 'image2', '3');

            Session::flash('success', 'You Have Successfully Edit Vehicle Details');
        });

        return back();
    }
}
