<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\RoomReservation;

class ControllerCountriesProvincesCities extends Controller
{
    public function getProvinces()
    {
        $country_id = request('country');

        $provinces = Province::where('country_id', $country_id)->get();
        $option = "<option value=''>Select Province </option>";

        foreach ($provinces as $province){
            $option .= '<option value="'.$province->id.'">'.$province->province_name.' </option>';
        }
        return $option;
    }

    public function getCities()
    {
        $province_id = request('province');

        $cities = City::where('province_id', $province_id)->get();
        $options = "<option value=''>Select City </option>";

        foreach ($cities as $city){
            $options .= '<option value="'.$city->id.'">'.$city->city_name.' </option>';
        }
        return $options;
    }

    public function getCustomerCnic()
    {
        $customer_id = request('customer');

        $customer_cnic = Client::where('id', $customer_id)->get();
        $options = "<option value=''>Select CNIC </option>";

        foreach ($customer_cnic as $customerCnic){
            $options .= '<option value="'.$customerCnic->id.'">'.$customerCnic->cnic.' </option>';
        }
        return $options;
    }

//    public function getCustomerReservationDetails()
//    {
//        $customer_id = request('customerCnic');
//        dd($customer_id);
//
//        $CustomerReservations = RoomReservation::where('client_id', $customer_id)->get();
//        $checkInDateTime = RoomReservation::getDateTimeAttribute($CustomerReservations->check_in_date_time);
//        $checkOutDateTime = RoomReservation::getDateTimeAttribute($CustomerReservations->check_out_date_time);
//
//        $options[] = "";
//
////        $options = "<option value=''>Select CNIC </option>";
////
////        foreach ($customer_cnic as $customerCnic){
////            $options .= '<option value="'.$customerCnic->id.'">'.$customerCnic->cnic.' </option>';
////        }
//        $options[0] = '<input value="'.$checkInDateTime.'">';
//        $options[1] = '<input value="'.$checkOutDateTime.'">';
//
//        return $options;
//    }
}
