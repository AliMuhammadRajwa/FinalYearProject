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
                            <h4 class="card-title text-left">Add New Vehicle Detail </h4>
                        </div>


                        <div class="card-body">
                            <form class="form was-validated" method="post"
                                  action="{{route('Update.Vehicle.details', $getVehicleDetailsId->id)}}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               value="{{$getVehicleDetailsId->vehicle_title}}"
                                               name="vehicle_title" required>
                                        <div class="invalid-feedback">
                                            Please provide Vehicle title...
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               value="{{$getVehicleDetailsId->vehicle_no}}"
                                               name="vehicle_no" required>
                                        <div class="invalid-feedback">
                                            Please provide Vehicle number...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="type" class="border-radius-text form-control"
                                               value="{{$getVehicleDetailsId->model}}"
                                               name="model" required>
                                        <div class="invalid-feedback">
                                            Please provide Vehicle Model...
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <input type="type" class="border-radius-text form-control"
                                               value="{{$getVehicleDetailsId->color}}"
                                               name="color">
                                        <div class="invalid-feedback">
                                            Please provide Vehicle Color...
                                        </div>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               value="{{$getVehicleDetailsId->tracker_no}}"
                                               name="tracker_no" required>
                                        <div class="invalid-feedback">
                                            Please provide Vehicle Tracker Number...
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               value="{{$getVehicleDetailsId->condition}}"
                                               name="vehicle_condition" required>
                                        <div class="invalid-feedback">
                                            Please provide Vehicle Condition...
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="vehicle_type"
                                                id="vehicle_type"
                                                required>
                                            <option selected value="{{$vehicletypeId->id}}">{{$vehicletypeId->title}}</option>

                                            @forelse($vehicletypes as $vehicletype)
                                                <option value="{{$vehicletype->id}}">{{$vehicletype->title}}</option>
                                            @empty
                                                <option value="">No Vehicle Type Added</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col">
                                        <select id="inputState" class="border-radius-text form-control" name="status"
                                                value="{{$getVehicleDetailsId->isActive}}">
                                            @if($getVehicleDetailsId->isActive =='1')
                                                <option selected value="1">Active</option>
                                                <option value="0">In Active</option>
                                            @else
                                                <option value="1">Active</option>
                                                <option selected value="0">In Active</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col">
                                        <input type="type" class="border-radius-text form-control"
                                               value="{{$getVehicleDetailsId->description}}"
                                               name="vehicle_description">

                                    </div>
                                </div>
                                <br><br>

                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image1" id="image1"
                                               accept="image/*">
                                        <label class="custom-file-label" for="image1">Choose image 1...</label>
                                    </span>
                                </span>
                                <br><br>


                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image2" id="image2"
                                               accept="image/*">
                                        <label class="custom-file-label" for="image2">Choose image 2...</label>
                                    </span>
                                </span>
                                <br><br>


                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image3" id="image3"
                                               accept="image/*">
                                        <label class="custom-file-label" for="image3">Choose image 3...</label>
                                    </span>
                                </span>
                                <br><br><br>


                                <div class="text-right">
                                    <button type="submit"
                                            class="btn btn-success btn-lg col-lg-2 text-center">Update<span
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

    <!--**********************************
        Content body end
    ***********************************-->
@endsection
