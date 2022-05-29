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
                            <h4 class="card-title text-left">Add New Room </h4>

                            <span class="text-right" style="">
                                        <a href="{{route('room.features.view')}}"
                                           class="btn btn-primary" style="font-size: small">+ Features </a>
                                    </span>
                            <span class="text-right" style="">
                                        <a href="{{route('room_type.view')}}"
                                           class="btn btn-primary" style=" font-size: small">+ Room Type</a>
                                    </span>
                            <span class="text-right" style="">
                                        <a href="{{route('bed_type.view')}}"
                                           class="btn btn-primary" style="margin-right: 10px; font-size: small">+ Bed Type</a>
                                    </span>
                        </div>



                        <div class="card-body">
                            <form class="form was-validated" method="post" action="{{route('room.add')}}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter room title..."
                                               name="room_title"
                                               value="{{old('room_title')}}"
                                               required>
                                        @if($errors->has('room_title'))
                                            <span class="text-danger">{{ $errors->first('room_title') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide room title...
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Please enter room #"
                                               name="room_no"
                                               value="{{old('room_no')}}"
                                               required>
                                        @if($errors->has('room_no'))
                                            <span class="text-danger">{{ $errors->first('room_no') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide room number...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="type" class="border-radius-text form-control"
                                               placeholder="Please enter room size"
                                               value="{{old('room_size')}}"
                                               name="room_size">
                                        @if($errors->has('room_size'))
                                            <span class="text-danger">{{ $errors->first('room_size') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide room size...
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text  form-control" name="room_type" id="room_type"
                                                required>
                                            <option selected value="">Select Room Type...</option>

                                            @forelse($RoomTypes as $RoomType)
                                                <option value="{{$RoomType->id}}">{{$RoomType->room_type}}</option>
                                            @empty
                                                <option value="">No Room Type Added</option>
                                            @endforelse
                                        </select>
                                    </div>


                                    <div class="col">
                                        <select class="border-radius-text form-control" name="bed_type" id="bed_type"
                                                required>
                                            <option selected value="">Select Bed Type...</option>

                                            @forelse($BedTypes as $BedType)
                                                <option value="{{$BedType->id}}">{{$BedType->bed_type}}</option>
                                            @empty
                                                <option value="">No Bed Type Added</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please add note..."
                                               name="description">
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Please enter room price..."
                                               name="room_price"
                                               value="{{old('room_price')}}"
                                               required>
                                        @if($errors->has('room_price'))
                                            <span class="text-danger">{{ $errors->first('room_price') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide room price...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="status" required>
                                            <option selected value="">Select Status...</option>
                                            <option value="1">Active</option>
                                            <option value="0">In Active</option>
                                        </select>
                                    </div>
                                </div>
                                <br>


                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image1" id="image1"
                                               accept="image/*">
                                        <label class="custom-file-label" for="image1">Choose image 1...</label>
                                    </span>
                                </span>
                                <br><br>


{{--                                <span class="mt-5" style="max-width: 100%;">--}}
{{--                                    <span class="custom-file">--}}
{{--                                        <input type="file" class="custom-file-input" name="image2" id="image2"--}}
{{--                                               accept="image/*">--}}
{{--                                        <label class="custom-file-label" for="image2">Choose image 2...</label>--}}
{{--                                    </span>--}}
{{--                                </span>--}}
{{--                                <br><br>--}}


{{--                                <span class="mt-5" style="max-width: 100%;">--}}
{{--                                    <span class="custom-file">--}}
{{--                                        <input type="file" class="custom-file-input" name="image3" id="image3"--}}
{{--                                               accept="image/*">--}}
{{--                                        <label class="custom-file-label" for="image3">Choose image 3...</label>--}}
{{--                                    </span>--}}
{{--                                </span>--}}
{{--                                <br><br><br>--}}


                                <div class="text-right">
                                    <button type="submit"
                                            class="btn btn-success btn-lg col-lg-2 text-center">Save<span
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
