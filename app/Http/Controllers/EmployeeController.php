<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Gender;
use App\Models\Client;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\EntityResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use File;

class EmployeeController extends Controller
{
    public function AddEmployee()
    {
        $countries = Country::all();
        $genders = Gender::all();
        return view('Employees.add_employees', compact('countries', 'genders'));
    }

    public function AllEmployee()
    {
        $allEmployees = Employee::AllEmployees();
        return view('Employees.all_employees', compact('allEmployees'));
    }

    public function ActiveEmployee()
    {
        $allEmployees = Employee::ActiveEmployees();
        return view('Employees.active_Employees', compact('allEmployees'));
    }

    public function SearchEngine( Request $request )
    {
        $allEmployees = Employee::SearchEmployees($request->search);
        return view('Employees.all_employees', compact('allEmployees'));
    }

    public function FillEmloyeeDetails( $id )
    {
        $countries = Country::all();
        $provinces = Province::all();
        $cities    = City::all();
        $genders   = Gender::all();

        $getEmployeeId = Employee::find($id);
        $CountryId     = Country::where('id', "=", $getEmployeeId->country_id)->first();
        $ProvinceId    = Province::where('id', "=", $getEmployeeId->province_id)->first();
        $CityId        = City::where('id', "=", $getEmployeeId->city_id)->first();
        $genderId      = Gender::where('id', "=", $getEmployeeId->gender_id)->first();
        $EntityResources    = EntityResource::where('imageable_id', "=", $getEmployeeId->id)
                                            ->where('imageable_type', "=", 'Hotel/Employee')->get();

        return view('Employees.edit_employee_details', compact('getEmployeeId', 'CountryId', 'ProvinceId', 'CityId', 'genderId', 'EntityResources', 'countries', 'provinces', 'cities', 'genders'));
    }

    public function store( Request $request )
    {
        \DB::transaction(function () use ( $request ) {
            $this->validate($request, [
                'first_name'        => 'required|max:40|string',
                'last_name'         => 'required|max:40|string',
                'cnic'              => 'max:13|string',
                'gender_id'         => 'required|max:20',
                'country_id'        => 'required|max:200',
                'province_id'       => 'required|max:30',
                'city_id'           => 'required|max:200',
                'contact'           => 'required|max:11|string',
                'permanent_address' => 'max:255',
                'email'             => 'required|max:80|email|unique:users,email',
                'status'            => 'required|max:200',
                'description'       => 'max:500',
            ]);

            $employee                    = new Employee();
            $employee->first_name        = $request->first_name;
            $employee->last_name         = $request->last_name;
            $employee->cnic              = $request->cnic;
            $employee->gender_id         = $request->gender_id;
            $employee->country_id        = $request->country_id;
            $employee->province_id       = $request->province_id;
            $employee->city_id           = $request->city_id;
            $employee->contact           = $request->contact;
            $employee->permanent_address = $request->permanent_address;
            $employee->email             = $request->email;
            $employee->isActive          = $request->status;
            $employee->description       = $request->description;
            $employee->save();

            MultipleUploadController::insertImages($request, $employee->id, 'Hotel/Employee', 'image', 1);
            MultipleUploadController::InsertEntityRelations($request, $employee->id, 'Hotel/Employee', Auth::user()->id);

            Session::flash('success', 'You Have Successfully Added a Employee');
        });

        return back();
    }

    public
    function getUpdatedValues( $id )
    {
        $data = Employee::find($id);
        return view('Employees.edit_employee_details', compact('data'));
    }

    public
    function EditEmployee( Request $request, $id )
    {
//       transaction Reverse if any table not fill
        \DB::transaction(function () use ( $request, $id ) {

            $this->validate($request, [
                'first_name'        => 'required|max:40|string',
                'last_name'         => 'required|max:40|string',
                'cnic'              => 'max:13|string',
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

            $editEmplolyee = Employee::find($id);
            MultipleUploadController::updateImages($request, $editEmplolyee->id, 'Hotel/Employee', 'image', $request->imageName, 1);

            //*********************************************************************
            $editEmplolyee->first_name        = $request->first_name;
            $editEmplolyee->last_name         = $request->last_name;
            $editEmplolyee->cnic              = $request->cnic;
            $editEmplolyee->gender_id         = $request->gender_id;
            $editEmplolyee->country_id        = $request->country_id;
            $editEmplolyee->province_id       = $request->province_id;
            $editEmplolyee->city_id           = $request->city_id;
            $editEmplolyee->contact           = $request->contact;
            $editEmplolyee->permanent_address = $request->permanent_address;
            $editEmplolyee->email             = $request->email;
            $editEmplolyee->isActive          = $request->status;
            $editEmplolyee->description       = $request->description;
            $editEmplolyee->image             = $request->imageName;
            $editEmplolyee->save();
            Session::flash('success', 'You Have Successfully Edit Employee Details...');
        });

        return back();
    }

    public function DeleteEmployee( $id )
    {
        $deleteEmployee = Employee::find($id);
        $image_path     = public_path() . '/img/' . $deleteEmployee->image;
        File::delete($image_path);
        $deleteEmployee->delete();
        return back();
    }
}
