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
                            <h4 class="card-title text-left">Edit Reservation Details</h4>
                        </div>

                        <div class="card-body">
                            <form class="form was-validated" action="{{route('reservation.edit', $getReservationId->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <label for="check_in_date_time">Check in Date and Time</label>
                                        <input type="datetime-local" name="check_in_date_time" class="border-radius-text form-control"  value="{{$checkInDateTime}}"
                                               min="2000-01-12T00:00" max="2050-12-12T00:00" required>

                                        <div class="invalid-feedback">
                                            Please provide check in date time...
                                        </div>
                                    </div>


                                    <div class="col">
                                        <label for="check_out_date_time">Check out Date and Time</label>
                                        <input type="datetime-local" name="check_out_date_time" class="border-radius-text form-control"  value="{{$checkOutDateTime}}" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide check out date time...
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="client_id">
                                            <option selected value="{{$ClientId->id}}">{{$ClientId->first_name . ' ' . $ClientId->last_name}}</option>

                                            @forelse($allCustomers as $allCustomer)
                                                <option value="{{$allCustomer->id}}">{{$allCustomer->first_name . ' ' . $allCustomer->last_name}}</option>
                                            @empty
                                                <option value="">No Customer Found!!!</option>
                                            @endforelse

                                        </select>
                                    </div>

                                    <div class="col">
                                        <input type="text" value="{{$RoomId->id}}" name="reserved_room_id" hidden>

                                        <select class="border-radius-text form-control" name="room_id">
                                            <option selected value="{{$RoomId->id}}">{{$RoomId->room_title}}</option>

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
                                        <input type="Number" class="border-radius-text form-control" name="no_of_adults"   value="{{$getReservationId->no_of_adults}}" placeholder="Please enter no of adults" required>
                                        <div class="invalid-feedback">
                                            Please provide no of adults...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="Number" class="border-radius-text form-control" name="no_of_childs"  value="{{$getReservationId->no_of_childs}}" placeholder="Please enter no of childs" required>
                                        <div class="invalid-feedback">
                                            Please provide no of childs...
                                        </div>
                                    </div>
                                </div>
                                <br><br>

                                <div class="row">
                                    <div class="col">
                                        <input type="Number" class="border-radius-text form-control" name="no_of_rooms"   value="{{$getReservationId->no_of_rooms}}" placeholder="Please enter no of rooms" required>
                                        <div class="invalid-feedback">
                                            Please provide no of rooms...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="status"
                                                value="{{$getReservationId->status}}">
                                            @if($getReservationId->status =='1')
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
                                        <input type="text-area" class="border-radius-text form-control" name="description"   value="{{$getReservationId->description}}" value="4657-03-06T05:47:00+00:00" placeholder="Please enter description...">
                                    </div>
                                </div>
                                <br><br>


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
        <!-- #/ container -->
    </div>

@endsection


