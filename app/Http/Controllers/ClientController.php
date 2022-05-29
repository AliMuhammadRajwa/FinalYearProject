<?php

namespace App\Http\Controllers;

use App\Models\City;
use Dotenv\Validator;
use App\Models\Gender;
use App\Models\Client;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\EntityResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Console\DbCommand;
use File;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\MultipleUploadController;

class ClientController extends Controller
{
    public function AddClient()
    {
        $countries = Country::all();
        $genders = Gender::all();
        return view('Clients.add_clients', compact('countries', 'genders'));
    }

    public function AllClient()
    {
        $allClients = Client::AllClients();
        return view('Clients.all_clients', compact('allClients'));
    }

    public function ActiveClient()
    {
        $allClients = Client::ActiveClients();
        return view('Clients.active_clients', compact('allClients'));
    }

    public function SearchEngine( Request $request )
    {
        $allClients = Client::SearchClients($request->search);
        return view('Clients.all_clients', compact('allClients'));
    }

    public function FillClientDetails( $id )
    {
        $countries = Country::all();
        $provinces = Province::all();
        $cities    = City::all();
        $genders   = Gender::all();

        $getClientId     = Client::find($id);
        $CountryId       = Country::where('id', "=", $getClientId->country_id)->firstOrFail();
        $ProvinceId      = Province::where('id', "=", $getClientId->province_id)->firstOrFail();
        $CityId          = City::where('id', "=", $getClientId->city_id)->firstOrFail();
        $genderId        = Gender::where('id', "=", $getClientId->gender_id)->firstOrFail();
        $EntityResources = EntityResource::where('imageable_id', "=", $getClientId->id)->where('imageable_type', "=", 'Hotel/Customer')->get();

        return view('Clients.edit_client_details', compact('getClientId', 'CountryId', 'ProvinceId', 'CityId', 'genderId', 'EntityResources', 'countries', 'provinces', 'cities', 'genders'));
    }

    public function store( Request $request )
    {
        \DB::transaction(function () use ( $request ) {

            $this->validate($request, [
                'first_name'        => 'required|max:40|string',
                'last_name'         => 'required|max:40|string',
                'cnic'              => 'required|max:13|string',
                'gender_id'         => 'required|max:20',
                'country_id'        => 'required|max:200',
                'province_id'       => 'required|max:30',
                'city_id'           => 'required|max:200',
                'contact'           => 'required|max:11|string',
                'permanent_address' => 'required|max:255',
                'email'             => 'required|max:80|email|unique:users,email',
                'status'            => 'required|max:200',
                'description'       => 'max:500',
            ]);

            $client                    = new Client();
            $client->first_name        = $request->first_name;
            $client->last_name         = $request->last_name;
            $client->cnic              = $request->cnic;
            $client->gender_id         = $request->gender_id;
            $client->country_id        = $request->country_id;
            $client->province_id       = $request->province_id;
            $client->city_id           = $request->city_id;
            $client->contact           = $request->contact;
            $client->permanent_address = $request->permanent_address;
            $client->email             = $request->email;
            $client->isActive          = $request->status;
            $client->description       = $request->description;
            $client->save();

            MultipleUploadController::insertImages($request, $client->id, 'Hotel/Customer', 'image', 1);
            MultipleUploadController::InsertEntityRelations($request, $client->id, 'Hotel/Customer', Auth::user()->id);

            Session::flash('success', 'You Have Successfully Added a Client');
        });

        return back();
    }

    public function getUpdatedValues( $id )
    {
        $data = Client::find($id);
        return view('Clients.edit_client_details', compact('data'));
    }

    public function EditClient( Request $request, $id )
    {
        \DB::transaction(function () use ( $request, $id ) {

            $this->validate($request, [
                'first_name'        => 'required|max:40|string',
                'last_name'         => 'required|max:40|string',
                'cnic'              => 'required|max:13|string',
                'gender_id'         => 'required|max:20',
                'country_id'        => 'required|max:200',
                'province_id'       => 'required|max:30',
                'city_id'           => 'required|max:200',
                'contact'           => 'required|max:11|string',
                'permanent_address' => 'required|max:255',
                'email'             => 'required|max:80|email|unique:users,email',
                'status'            => 'required|max:200',
                'description'       => 'max:500',
            ]);

            $editClient = Client::find($id);
            MultipleUploadController::updateImages($request, $editClient->id, 'Hotel/Customer', 'image', $request->imageName, 1);

            //            $imageable_id = EntityResource::where('imageable_id', "=", $editClient->id)
            //                                          ->Where('imageable_type', '=', 'Hotel/Customer')
            //                                          ->Where('file_name', '=', $editClient->image)->first();
            //
            //            $editImageable            = EntityResource::find($imageable_id->id);
            //            //*********************************************************************
            //
            //            if ( $request->hasfile('image') ) {
            //                $image              = $request->file('image');
            //                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            //                $destinationPath    = public_path('/img');
            //                $image->move($destinationPath, $input['imagename']);
            //                $imageForDb = $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            //            }
            //            else {
            //                $imageForDb = $editImageable->file_name;
            //            }
            //
            //            $editImageable->file_name = $imageForDb;
            //            $editImageable->save();
            //*********************************************************************

            $editClient->first_name        = $request->first_name;
            $editClient->last_name         = $request->last_name;
            $editClient->cnic              = $request->cnic;
            $editClient->gender_id         = $request->gender_id;
            $editClient->country_id        = $request->country_id;
            $editClient->province_id       = $request->province_id;
            $editClient->city_id           = $request->city_id;
            $editClient->contact           = $request->contact;
            $editClient->permanent_address = $request->permanent_address;
            $editClient->email             = $request->email;
            $editClient->isActive          = $request->status;
            $editClient->description       = $request->description;
            $editClient->save();

            Session::flash('success', 'You Have Successfully Edit Client Details...');
        });

        return back();
    }

    public function DeleteClient( $id )
    {
        $client     = Client::find($id);
        $image_path = public_path() . '/img/' . $client->image;
        File::delete($image_path);
        $client->delete();
        return back();
    }
}
