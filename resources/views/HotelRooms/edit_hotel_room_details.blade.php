@extends('layouts.layout')
@section('content')

    <!--**********************************
            Page Styling
     ***********************************-->

    <style>
        .border-radius-text{
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
                            <h4 class="card-title text-left">Edit Room Details </h4>
                        </div>

                        <div class="card-body">
                            <form class="form was-validated" method="post"
                                  action="{{route('room.edit', $getRoomId->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" placeholder="Please enter room title..."
                                               name="room_title" value="{{$getRoomId->room_title}}">
                                        <div class="invalid-feedback">
                                            Please provide room title...
                                        </div>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control" placeholder="Please enter room #"
                                               name="room_no" value="{{$getRoomId->room_no}}">
                                        <div class="invalid-feedback">
                                            Please provide room number...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="type" class="border-radius-text form-control" placeholder="Please enter room size"
                                               name="room_size" value="{{$getRoomId->room_size}}">
                                        <div class="invalid-feedback">
                                            Please provide room size...
                                        </div>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="room_type" id="room_type">
                                            <option selected value="{{$RoomTypeId->id}}">{{$RoomTypeId->room_type}}</option>

                                            @forelse($RoomTypes as $RoomType)
                                                <option value="{{$RoomType->id}}">{{$RoomType->room_type}}</option>
                                            @empty
                                                <option value="">No Room Type Added</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="bed_type" id="bed_type">
                                            <option selected
                                                    value="{{$BedTypeId->id}}">{{$BedTypeId->bed_type}}</option>

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
                                        <input type="text" class="border-radius-text form-control" placeholder="Please add note..."
                                               name="description" value="{{$getRoomId->description}}">
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Please enter room price..."
                                               name="room_price" value="{{$getRoomId->total_price}}">
                                        <div class="invalid-feedback">
                                            Please provide room price...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="status"
                                                value="{{$getRoomId->status}}">
                                            @if($getRoomId->status =='1')
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


                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image1"  id="image1"
                                               accept="image/*">
                                        <label class="custom-file-label" for="image1">Choose image 1...</label>
                                    </span>
                                </span>
                                <br><br>


                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image2"  id="image2"
                                               accept="image/*">
                                        <label class="custom-file-label" for="image2">Choose image 2...</label>
                                    </span>
                                </span>
                                <br><br>


                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image3"  id="image3"
                                               accept="image/*">
                                        <label class="custom-file-label" for="image3">Choose image 3...</label>
                                    </span>
                                </span>
                                <br><br>


                                <div>
                                    @php  $count = 1; @endphp

                                    @foreach($EntityResources as $EntityResource)
                                        <span><img class="rounded-circle" src="{{asset('img/' . $EntityResource->file_name)}}"
                                                   style="width: 120px; height: 120px;"></span>

                                        @if($count == 1)
                                            <input value="{{$EntityResource->file_name}}" name="imageName1" hidden>
                                            {!! $count++ !!}

                                        @elseif($count == 2)
                                            <input value="{{$EntityResource->file_name}}" name="imageName2" hidden>
                                            {!! $count++ !!}

                                        @elseif ($count == 3)
                                            <input value="{{$EntityResource->file_name}}" name="imageName3" hidden>
                                            {!! $count++ !!}

                                        @endif
                                    @endforeach
                                </div>
                                <br>

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
    <!-- #/ container -->

    <!--**********************************
        Content body end
    ***********************************-->

@endsection


