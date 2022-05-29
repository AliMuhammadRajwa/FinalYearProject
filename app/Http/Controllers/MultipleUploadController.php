<?php

namespace App\Http\Controllers;


use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\EntityExpense;
use App\Models\EntityResource;
use App\Models\EntityRelations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;

class MultipleUploadController extends Controller
{
    public function view()
    {
        return view('photos');
    }

    public static function InsertImages( Request $request, $imageableId, $imageableType, $key, $count )
    {
        $request->validate([
            'imageFile.*' => 'mimes:jpeg,jpg,png'
        ]);

        if ( $request->hasfile($key) ) {
            $image              = $request->file($key);
            $input['imagename'] = time() . $count . '.' . ( $image )->getClientOriginalExtension();
            $destinationPath    = public_path('/img');
            $image->move($destinationPath, $input['imagename']);
            $imageForDb = $input['imagename'];


            $editImageable                 = new EntityResource();
            $editImageable->imageable_id   = $imageableId;
            $editImageable->imageable_type = $imageableType;
            $editImageable->file_name      = $imageForDb;
            $editImageable->save();
        }
    }

    public static function updateImages( Request $request, $imageableId, $imageableType, $key, $image_name, $count )
    {
        $request->validate([
            'imageFile.*' => 'mimes:jpeg,jpg,png'
        ]);

        $imageable_id = EntityResource::where('imageable_id', "=", $imageableId)
                                      ->Where('imageable_type', '=', $imageableType)
                                      ->Where('file_name', '=', $image_name)->first();


        if ( $imageable_id != "" && $imageable_id != NULL && $imageable_id != "null" ) {
            if ( $request->hasfile($key) ) {

                $editImageable = EntityResource::find($imageable_id->id);

                $image              = $request->file($key);
                $input['imagename'] = time() . $count . '.' . $image->getClientOriginalExtension();
                $destinationPath    = public_path('/img');
                $image->move($destinationPath, $input['imagename']);
                $imageForDb = $input['imagename'];

                $image_path = public_path() . '/img/' . $image_name;
                File::delete($image_path);

                $editImageable->file_name = $imageForDb;
                $editImageable->save();
            }

        } else {
            MultipleUploadController::insertImages($request, $imageableId, $imageableType, $key, $count);
        }

    }

    public static function InsertEntityRelations( Request $request, $relationId, $relationType, $user_id )
    {
        $relations                = new EntityRelations();
        $relations->relation_id   = $relationId;
        $relations->relation_type = $relationType;
        $relations->user_id       = $user_id;
        $relations->save();
    }

    public static function InsertEntityExpenses( Request $request, $relationId, $relationType, $user_id )
    {
        $relations                = new EntityExpense();
        $relations->relation_id   = $relationId;
        $relations->relation_type = $relationType;
        $relations->user_id       = $user_id;
        $relations->save();
    }



    //*****************************************************
    //***Website Hotel Page Details ***
    //*****************************************************

    public static function loadMainPage()
    {
        $hotelDetails = Hotel::leftJoin('entity_resources', function ( $join ) {
            $join->on('hotels.id', '=', 'entity_resources.imageable_id')
                 ->where('entity_resources.imageable_type', '=', 'Hotel/HotelImages');
        })
                             ->where('hotels.status', "=", '1')
                             ->select('hotels.id', 'hotels.hotel_title', 'hotels.address', 'hotels.description', 'entity_resources.file_name')
                             ->latest('entity_resources.file_name')->get()->take(8)->unique();

        return $hotelDetails;
    }

    public static function LoadHotelPage()
    {
        $hotelDetails = Hotel::leftJoin('entity_resources', function ( $join ) {
            $join->on('hotels.id', '=', 'entity_resources.imageable_id')->
            where('entity_resources.imageable_type', '=', 'Hotel/HotelImages');
        })
                             ->where('hotels.status', "=", '1')
                             ->select('hotels.id', 'hotels.hotel_title', 'hotels.address', 'hotels.description', 'entity_resources.file_name')
                             ->get()->unique();

        return $hotelDetails;
    }

    public static function FilterHotelDetails( Request $request )
    {
        //        $hotelDetails = EntityResource::join('hotels', 'hotels.id', '=', 'entity_resources.imageable_id')
        //                                      ->join('countries', 'countries.id', '=', 'hotels.country_id')
        //                                      ->join('provinces', 'provinces.id', '=', 'hotels.province_id')
        //                                      ->join('cities', 'cities.id', '=', 'hotels.city_id')
        //                                      ->where('entity_resources.imageable_type', "=", 'Hotel/HotelImages')
        //                                      ->where('countries.id', "=", $request->country_id)
        //                                      ->where('provinces.id', "=", $request->province_id)
        //                                      ->where('cities.id', "=", $request->city_id)
        //                                      ->where('hotels.status', "=", '1')
        //                                      ->select('hotels.id', 'hotels.hotel_title', 'hotels.description', 'entity_resources.file_name')
        //                                      ->get()->unique();
        $hotelDetails = Hotel::leftJoin('entity_resources', function ( $join ) {
            $join->on('hotels.id', '=', 'entity_resources.imageable_id')
                 ->where('entity_resources.imageable_type', '=', 'Hotel/HotelImages');
        })
                             ->join('countries', 'countries.id', '=', 'hotels.country_id')
                             ->join('provinces', 'provinces.id', '=', 'hotels.province_id')
                             ->join('cities', 'cities.id', '=', 'hotels.city_id')
                             ->where('countries.id', "=", $request->country_id)
                             ->where('provinces.id', "=", $request->province_id)
                             ->where('cities.id', "=", $request->city_id)
                             ->where('hotels.status', "=", '1')
                             ->select('hotels.id', 'hotels.hotel_title', 'hotels.description', 'entity_resources.file_name')
                             ->get()->unique();

        return $hotelDetails;
    }

    public static function LoadHotelRoomsGallary( $id )
    {
        //        $hotelRoomsGallary = EntityResource::join('rooms', 'rooms.id', '=', 'entity_resources.imageable_id')
        //                                           ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
        //                                           ->where('entity_resources.imageable_type', "=", 'Hotel/Rooms')
        //                                           ->where('rooms.status', "=", '0')
        //                                           ->where('hotels.id', "=", $id)
        //                                           ->select('rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.description', 'entity_resources.file_name')
        //                                           ->get()->unique();

        $hotelRoomsGallary = Room:: leftJoin('entity_resources', function ( $join ) {
            $join->on('rooms.id', '=', 'entity_resources.imageable_id')
                 ->where('entity_resources.imageable_type', '=', 'Hotel/Rooms');
        })
                                 ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
                                 ->join('bed_types', 'bed_types.id', '=', 'rooms.bed_type_id')
                                 ->join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
                                 ->where('rooms.status', "=", '0')
                                 ->where('hotels.id', "=", $id)
                                 ->select('rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.total_price', 'bed_types.bed_type',
                                     'room_types.room_type', 'entity_resources.file_name')
                                 ->get()->unique();

        return $hotelRoomsGallary;
    }

    public static function FilterHotelRoomsGallary( Request $request, $id )
    {

        $hotelRoomsGallary = Room:: leftJoin('entity_resources', function ( $join ) {
            $join->on('rooms.id', '=', 'entity_resources.imageable_id')
                 ->where('entity_resources.imageable_type', '=', 'Hotel/Rooms');
        })
                                 ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
                                 ->join('bed_types', 'bed_types.id', '=', 'rooms.bed_type_id')
                                 ->join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
                                 ->where('rooms.status', "=", '0')
                                 ->where('hotels.id', "=", $id)
                                 ->whereBetween('rooms.total_price', [ $request->budget_range_min, $request->budget_range_max ])
                                 ->select('rooms.id', 'rooms.room_title', 'rooms.room_no', 'rooms.total_price', 'bed_types.bed_type',
                                     'room_types.room_type', 'entity_resources.file_name')
                                 ->get()->unique();

        return $hotelRoomsGallary;
    }

    //*****************************************************
    //      ***End Website Hotel Page Details ***
    //*****************************************************

    //
    //        public static function store( Request $request, $imageable_id, $imageable_type )
    //        {
    //            $request->validate([
    //                'imageFile'   => 'required',
    //                'imageFile.*' => 'mimes:jpeg,jpg,png'
    //            ]);
    //
    //            $imageFile = [];
    //            $imageFile = $request->file('imageFile');
    //
    //            if ( $request->hasfile('imageFile') ) {
    //
    //                for ( $x = 0; $x < count($imageFile); $x++ ) {
    //                    //            $name               = $imageFile[$x]->getClientOriginalName();
    //                    $input['imagename'] = time() . $x . '.' . $imageFile[$x]->getClientOriginalExtension();
    //                    $destinationPath    = public_path('/img');
    //                    $imageFile[$x]->move($destinationPath, $input['imagename']);
    //
    //                    $fileModal                 = new EntityResource();
    //                    $fileModal->imageable_id   = $imageable_id;
    //                    $fileModal->imageable_type = $imageable_type;
    //                    $fileModal->file_name      = $input['imagename'];
    //                    $fileModal->save();
    //                }
    //            }
    //        }
    //
    //
    //
    //        public static function update( Request $request, $imageable_id, $imageable_type )
    //        {
    //            $request->validate([
    //                'imageFile'   => 'required',
    //                'imageFile.*' => 'mimes:jpeg,jpg,png'
    //            ]);
    //
    //            $imageFile = [];
    //            $imageFile = $request->file('imageFile');
    //
    //            if ( $request->hasfile('imageFile') ) {
    //
    //                for ( $x = 0; $x < count($imageFile); $x++ ) {
    //                    //            $name               = $imageFile[$x]->getClientOriginalName();
    //                    $input['imagename'] = time() . $x . '.' . $imageFile[$x]->getClientOriginalExtension();
    //                    $destinationPath    = public_path('/img');
    //                    $imageFile[$x]->move($destinationPath, $input['imagename']);
    //
    //                    $fileModal                 = new EntityResource();
    //                    $fileModal->imageable_id   = $imageable_id;
    //                    $fileModal->imageable_type = $imageable_type;
    //                    $fileModal->file_name      = $input['imagename'];
    //                    $fileModal->save();
    //                }
    //            }
    //        }
}
