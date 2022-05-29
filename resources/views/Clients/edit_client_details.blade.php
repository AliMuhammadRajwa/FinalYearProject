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
                            <h4 class="card-title text-left">Edit Customer Details</h4>
                        </div>

                        <div class="card-body">
                            <form class="form was-validated" action="{{route('edit.client', $getClientId->id)}}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" placeholder="Enter First name"
                                               name="first_name" value="{{$getClientId->first_name}}" required>
                                        <div class="invalid-feedback">
                                            Please provide first name...
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" placeholder="Enter Last name"
                                               name="last_name" value="{{$getClientId->last_name}}" required>
                                        <div class="invalid-feedback">
                                            Please provide last name...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control" placeholder="Enter CNIC #" name="cnic"
                                               value="{{$getClientId->cnic}}" required>
                                        <div class="invalid-feedback">
                                            Please provide cnic #...
                                        </div>
                                    </div>

                                    <div class="col">

                                        <select id="inputState" class="border-radius-text form-control" name="gender_id">
                                            <option selected value="{{$genderId->id}}"
                                                    required>{{$genderId->gender_name}}</option>

                                            @forelse($genders as $gender)
                                                <option value="{{$gender->id}}">{{$gender->gender_name}}</option>
                                            @empty
                                                <option value="">No Gender Added</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
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

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="province_id" id="province">
                                            <option selected value="{{$ProvinceId->id}}"
                                                    required>{{$ProvinceId->province_name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="city_id" id="city">
                                            <option selected value="{{$CityId->id}}">{{$CityId->city_name}}</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control" placeholder="Enter Contact #"
                                               name="contact" value="{{$getClientId->contact}}" required>
                                        <div class="invalid-feedback">
                                            Please provide contact #...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" name="permanent_address"
                                               placeholder="Enter Permanent Address"
                                               value="{{$getClientId->permanent_address}}" required>
                                        <div class="invalid-feedback">
                                            Please provide permanent address...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" placeholder="Enter Email Address"
                                               name="email" value="{{$getClientId->email}}" required>
                                        <div class="invalid-feedback">
                                            Please provide email address...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <select id="inputState" class="border-radius-text form-control" name="status"
                                                value="{{$getClientId->isActive}}">
                                            @if($getClientId->isActive =='1')
                                                <option selected value="1">Active</option>
                                                <option value="0">In Active</option>
                                            @else
                                                <option value="1">Active</option>
                                                <option selected value="0">In Active</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" placeholder="Description..."
                                               name="description" value="{{$getClientId->description}}">
                                    </div>
                                </div>
                                <br>

                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                               accept="image/*">
                                        <label class="custom-file-label" for="logo">Choose Image...</label>
                                    </span>
                                </span>
                                <br><br>


                                <div>
                                    @foreach($EntityResources as $EntityResource)
                                        <div><img class="rounded-circle"
                                                  src="{{asset('img/' . $EntityResource->file_name)}}"
                                                  style="width: 120px; height: 120px;"> <input
                                                value="{{$EntityResource->file_name}}" name="imageName"
                                                hidden></div>
                                    @endforeach
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <input type="file" class="border-radius-text form-control-file" name="image" id="image"--}}
{{--                                           accept="image/*"><br>--}}


{{--                                    <div class="invalid-feedback">--}}
{{--                                        Please provide image...--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <br>--}}

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
