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
                            <h4 class="card-title text-left">Edit Driver Details </h4>
                        </div>

                        <div class="card-body">
                            <form class="form was-validated" action="{{route('update.driver.detail',$driver->id)}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               value="{{$driver->first_name}}"
                                               name="driver_first_name" required
                                        >
                                        <div class="invalid-feedback">
                                            Please Provide Driver's First Name ...
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               value="{{$driver->last_name}}"
                                               name="driver_last_name" required>
                                        <div class="invalid-feedback">
                                            Please Provide Driver's Last Name ...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               value="{{$driver->cnic}}"
                                               name="driver_cnic" required readonly>
                                        <div class="invalid-feedback">
                                            Please Provide Driver's CNIC ......
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               value="{{$driver->contact_no}}"
                                               name="driver_contact" required readonly>
                                        <div class="invalid-feedback">
                                            Please Provide Contact #...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="email" class="border-radius-text form-control"
                                               value="{{$driver->email}}"
                                               name="driver_email" readonly>

                                    </div>

                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               value="{{$driver->address}}"
                                               name="driver_address">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="gender_id">
                                            <option selected required
                                                    value="{{$genderId->id}}">{{$genderId->gender_name}}</option>

                                            @forelse($genders as $gender)
                                                <option value="{{$gender->id}}">{{$gender->gender_name}}</option>
                                            @empty
                                                <option value="">No Gender Added</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="country_id" id="country"
                                                required>
                                            <option selected
                                                    value="{{$CountryId->id}}">{{$CountryId->country_name}}</option>

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
                                        <select class="border-radius-text form-control" name="province_id" id="province"
                                                required>
                                            <option selected value="{{$ProvinceId->id}}"
                                                    required>{{$ProvinceId->province_name}}</option>

                                        </select>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="city_id" id="city"
                                                required>
                                            <option value="{{$CityId->id}}">{{$CityId->city_name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <select id="inputState" class="border-radius-text form-control" name="status"
                                            value="{{$driver->status}}">
                                        @if($driver->status =='1')
                                            <option selected value="1">Active</option>
                                            <option value="0">In Active</option>
                                        @else
                                            <option value="1">Active</option>
                                            <option selected value="0">In Active</option>
                                        @endif
                                    </select>
                                </div>
                                <br>
                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                               accept="image/*">
                                        <label class="custom-file-label" for="image">Choose image...</label>
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
                                <br><br><br>

                                <div class="text-right">
                                    <button type="submit"
                                            class="btn btn-success btn-lg col-lg-2 text-center">Update
                                        <span
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
