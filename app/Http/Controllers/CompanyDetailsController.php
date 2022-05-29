<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EntityResource;
use Illuminate\Support\Facades\Auth;
use App\Models\TransportCompanyDetails;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MultipleUploadController;

class CompanyDetailsController extends Controller
{
    public function CompanyDetail()
    {
        $countries = Country::all();
        return view('Transportation.Company.add_company_detail', compact('countries'));
    }

    public function StoreCompanyDetail( Request $request )
    {
        \DB::transaction(function () use ( $request ) {

            $this->validate($request, [
                'company_title'       => 'required|max:40|string',
                'company_address'     => 'required|string',
                'company_contact'     => 'required|max:11',
                'company_web'         => 'string',
                'company_facebook'    => 'string',
                'company_email'       => 'required|max:80|email|unique:users,email',
                'company_description' => 'max:500',
                'status'              => 'required|max:30',
            ]);

            $company                = new TransportCompanyDetails();
            $company->company_title = $request->company_title;
            $company->company_code  = Str::random(10);
            $company->address       = $request->company_address;
            $company->contact_no    = $request->company_contact;
            $company->email         = $request->company_email;
            $company->website_url   = $request->company_web;
            $company->facebook_url  = $request->company_facebook;
            $company->description   = $request->company_description;
            $company->status        = $request->status;
            $company->country_id    = $request->country_id;
            $company->province_id   = $request->province_id;
            $company->city_id       = $request->city_id;
            $company->user_id       = Auth::user()->id;
            $company->save();


            MultipleUploadController::insertImages($request, $company->id, 'Company/CompanyImages', 'logo', '1');
            MultipleUploadController::insertImages($request, $company->id, 'Company/CompanyImages', 'image1', '2');
            MultipleUploadController::insertImages($request, $company->id, 'Company/CompanyImages', 'image2', '3');

            Session::flash('success', 'You Have Successfully Added a Company');
        });

        return back();
    }

    public function CompanyDetails()
    {
        $companyDetails = TransportCompanyDetails::CompanyDetail();
        return view('Transportation.Company.company_details', compact('companyDetails'));
    }

    public function FillCompanyDetails( $id )
    {
        $countries = Country::all();

        $getCompanyId = TransportCompanyDetails::find($id);
        $CountryId    = Country::where('id', "=", $getCompanyId->country_id)->firstOrFail();
        $ProvinceId   = Province::where('id', "=", $getCompanyId->province_id)->firstOrFail();
        $CityId       = City::where('id', "=", $getCompanyId->city_id)->firstOrFail();

        $EntityResources = EntityResource::where('imageable_id', "=", $getCompanyId->id)
                                         ->where('imageable_type', "=", 'Company/CompanyImages')->get();

        return view('Transportation.Company.edit_company_details', compact('getCompanyId', 'CountryId', 'ProvinceId', 'CityId', 'EntityResources', 'countries'));
    }

    public function Update( Request $request, $id )
    {
        \DB::transaction(function () use ( $request, $id ) {

            $this->validate($request, [
                'company_title'       => 'required|max:40|string',
                'company_address'     => 'required|string',
                'contact_no'          => 'required|max:11',
                'country_id'          => 'required|max:200',
                'province_id'         => 'required|max:30',
                'city_id'             => 'required|max:200',
                'company_web'         => 'string',
                'company_facebook'    => 'string',
                'company_email'       => 'required|max:80|email|unique:users,email',
                'company_description' => 'max:500',
                'status'              => 'required|max:30',
            ]);

            $company = TransportCompanyDetails::find($id);

            MultipleUploadController::updateImages($request, $company->id, 'Company/CompanyImages', 'logo', $request->imageName1, 1);
            MultipleUploadController::updateImages($request, $company->id, 'Company/CompanyImages', 'image1', $request->imageName2, 2);
            MultipleUploadController::updateImages($request, $company->id, 'Company/CompanyImages', 'image2', $request->imageName3, 3);


            $company->company_title = $request->company_title;
            $company->company_code  = Str::random(10);
            $company->address       = $request->company_address;
            $company->contact_no    = $request->contact_no;
            $company->email         = $request->company_email;
            $company->website_url   = $request->company_web;
            $company->facebook_url  = $request->company_facebook;
            $company->description   = $request->company_description;
            $company->status        = $request->status;
            $company->country_id    = $request->country_id;
            $company->province_id   = $request->province_id;
            $company->city_id       = $request->city_id;
            $company->user_id       = Auth::user()->id;
            $company->save();

            Session::flash('success', 'You Have Successfully Update Company Details');
        });

        return back();
    }


}
