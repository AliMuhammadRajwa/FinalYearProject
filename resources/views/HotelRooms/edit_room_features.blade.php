@extends('layouts.layout')
@section('content')

    <!--**********************************
            Page Styling
     ***********************************-->

    <style>
        .border-radius-text {
            border-radius: 5px;
        }

    </style>


    <!--**********************************
            Content body start
     ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-right">
                            <h4 class="card-title text-left">Edit Room Features </h4>
                        </div>

                        <div class="card-body">
                            <form class="form was-validated" method="post"
                                  action="{{route('features.update', $getRoomFeaturesId->id)}}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="room_id" id="room_id">
                                            <option selected
                                                    value="{{$allRoomsId->id}}">{{$allRoomsId->room_title}}</option>

                                            @forelse($allRooms as $allRoom)
                                                <option value="{{$allRoom->id}}">{{$allRoom->room_title}}</option>
                                            @empty
                                                <option value="">No Room Found!!!</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <br><br>

                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="feature_id" id="feature_id">
                                            <option selected
                                                    value="{{$allFeaturesTitlesId->id}}">{{$allFeaturesTitlesId->feature_title}}</option>

                                            @forelse($allFeatureTitles as $allFeatureTitle)
                                                <option value="{{$allFeatureTitle->id}}">{{$allFeatureTitle->feature_title}}</option>
                                            @empty
                                                <option value="">No Feature Title Found!!!</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Please enter feature price..."
                                               name="feature_price" value="{{$getRoomFeaturesId->price}}">
                                        <div class="invalid-feedback">
                                            Please Provide Phone Number ..
                                        </div>
                                    </div>
                                </div>

                                <br><br>


                                <div class="text-right">
                                    <button type="submit"
                                            class="btn btn-success col-sm-2 text-center">Update<span
                                            class="btn-icon-right"><i class="fa fa-upload"></i></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->

    <!--**********************************
        Content body end
    ***********************************-->

@endsection


