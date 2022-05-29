<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\EntityResource;

class MainPageController extends Controller
{
    public function loadMainPage()
    {
        $hotelDetails = MultipleUploadController::loadMainPage();
        return view('WebsiteViews.website_home_page', compact('hotelDetails'));
    }

    public function LoadHotelPage()
    {
        $countries    = Country::all();
        $hotelDetails = MultipleUploadController::LoadHotelPage();

        return view('WebsiteViews.Hotel_Details.all_hotels_list', compact('hotelDetails', 'countries'));
    }

    public function LoadFilterwiseHotels( Request $request )
    {
        $countries    = Country::all();
        $hotelDetails = MultipleUploadController::FilterHotelDetails($request);

        return view('WebsiteViews.Hotel_Details.all_hotels_list', compact('hotelDetails', 'countries'));
    }


    public function LoadHotelRoomsGallary($id )
    {
        $hotelRoomsGallary = MultipleUploadController::LoadHotelRoomsGallary($id);
        return view('WebsiteViews.Hotel_Details.hotel_gallary', compact('hotelRoomsGallary', 'id'));
    }


    public function FilterHotelRoomsGallary(Request $request, $id)
    {
        $hotelRoomsGallary = MultipleUploadController::FilterHotelRoomsGallary($request, $id);
        return view('WebsiteViews.Hotel_Details.hotel_gallary', compact('hotelRoomsGallary', 'id'));
    }
}
