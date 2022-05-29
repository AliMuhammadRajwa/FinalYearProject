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
                            <h4 class="card-title text-left">Add New Hotel </h4>
                        </div>

                        <div class="card-body">
                            {{--                            @if ($errors->any())--}}
                            {{--                                <div class="alert alert-danger">--}}
                            {{--                                    <ul>--}}
                            {{--                                        @foreach ($errors->all() as $error)--}}
                            {{--                                            <li>{{ $error }}</li>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}
                            <form class="form was-validated" action="{{route('hotel.edit', $getHotelId->id)}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter hotel title..."
                                               name="hotel_name" value="{{$getHotelId->hotel_title}}" required>
                                        <div class="invalid-feedback">
                                            Please Provide Hotel Title ...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="email" class="border-radius-text form-control"
                                               placeholder="Please enter email"
                                               name="hotel_email" value="{{$getHotelId->email}}" required>
                                        <div class="invalid-feedback">
                                            Please Provide Email Address......
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Please enter contact #"
                                               name="hotel_contact" value="{{$getHotelId->contact_no}}" required>
                                        <div class="invalid-feedback">
                                            Please Provide Contact #...
                                        </div>
                                    </div>


                                    <div class="col">
                                        <select class="border-radius-text form-control" name="country_id" id="country">
                                            <option selected value="{{$CountryId->id}}"
                                                    required>{{$CountryId->country_name}}</option>

                                            @forelse($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @empty
                                                <option value="">No Counties Added</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="province_id"
                                                id="province">
                                            <option selected value="{{$ProvinceId->id}}"
                                                    required>{{$ProvinceId->province_name}}</option>
                                        </select>
                                    </div>


                                    <div class="col">
                                        <select class="border-radius-text form-control" name="city_id" id="city">
                                            <option selected value="{{$CityId->id}}">{{$CityId->city_name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter hotel Website link"
                                               name="hotel_web" value="{{$getHotelId->website_url}}">
                                    </div>

                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter hotel FB Link"
                                               name="hotel_facebook" value="{{$getHotelId->facebook_url}}">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter hotel address..."
                                               name="hotel_address" value="{{$getHotelId->address}}" required>
                                        <div class="invalid-feedback">
                                            Please Provide Hotel Address...
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter hotel description..."
                                               name="hotel_description" value="{{$getHotelId->description}}">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="status"
                                                value="{{$getHotelId->status}}">
                                            @if($getHotelId->status =='1')
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
                                        <input type="file" class="custom-file-input" name="logo" id="logo"
                                               accept="image/*">
                                        <label class="custom-file-label" for="logo">Choose logo...</label>
                                    </span>
                                    </span>
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


                                <div>
                                    @php  $count = 1; @endphp

                                    @foreach($EntityResources as $EntityResource)
                                        <span><img class="rounded-circle"
                                                   src="{{asset('img/' . $EntityResource->file_name)}}"
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
        <!-- #/ container -->
    </div>

    <!--**********************************
        Content body end
    ***********************************-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{--    // Country wise Provinces--}}
    <script>
        $(document).ready(function () {
            $("#country").change(function () {
                let country_id = this.value;

                $.get('/get_provinces?country=' + country_id, function (data) {
                    $("#province").html(data);
                })
            })
        })

    </script>


    {{--    // Province wise cities--}}
    <script>
        $(document).ready(function () {
            $("#province").change(function () {
                let province_id = this.value;

                $.get('/get_cities?province=' + province_id, function (data) {
                    // console.log(data);
                    $("#city").html(data);
                })
            })
        })

    </script>

@endsection
