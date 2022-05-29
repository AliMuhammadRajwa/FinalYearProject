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
                            <h4 class="card-title text-left">Add New Driver </h4>
                            <span class="text-right" style="">
                                        <a href="{{ route('country.view') }}"
                                           class="btn btn-primary" style="font-size: small ">+ Country </a>
                                    </span>
                            <span class="text-right" style="">
                                        <a href="{{ route('province.view' )}}"
                                           class="btn btn-primary" style="font-size: small">+ Province </a>
                                    </span>
                            <span class="text-right" style="">
                                        <a href="{{ route('city.view' )}}"
                                           class="btn btn-primary"
                                           style="height: 36px;width: 100px; margin-right: 10px; font-size: small">+ City </a>
                                    </span>
                        </div>


                        <div class="card-header text-right">

                        </div>

                        <div class="card-body">
                            <form class="form was-validated" action="{{route('add_driver.detail')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter Driver's First Name..."
                                               name="driver_first_name"
                                               required
                                               value="{{ old('driver_first_name') }}"
                                        >

                                        <div class="invalid-feedback">
                                            Please Provide Driver's First Name ...
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter Driver's Last Name..."
                                               name="driver_last_name" required
                                               value="{{ old('driver_last_name') }}"
                                        >
                                        <div class="invalid-feedback">
                                            Please Provide Driver's Last Name ...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="number"
                                               class="border-radius-text form-control @error('driver_cinc') is-Already-Taken @enderror"
                                               placeholder="Please enter Driver's CNIC"
                                               name="driver_cnic"
                                               required
                                               value="{{ old('driver_cnic') }}"
                                        >
                                        @if($errors->has('driver_cnic'))
                                            <span class="text-danger">{{ $errors->first('driver_cnic') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please Provide Driver's CNIC ......
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Please enter contact #"
                                               name="driver_contact"
                                               value="{{ old('driver_contact') }}"
                                               required>
                                        @if($errors->has('driver_contact'))
                                            <span class="text-danger">{{ $errors->first('driver_contact') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please Provide Contact #...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="email" class="border-radius-text form-control"
                                               placeholder="Please enter Driver's Email"
                                               name="driver_email"
                                               value="{{ old('driver_email') }}"
                                        >
                                        @if($errors->has('driver_email'))
                                            <span class="text-danger">{{ $errors->first('driver_email') }}</span>
                                        @endif
                                    </div>

                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter Driver's Address"
                                               name="driver_address"
                                               value="{{ old('driver_address') }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="gender_id">
                                            <option selected required>Select Gender...</option>

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
                                            <option selected value="">Select Country...</option>

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
                                                required></select>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="city_id" id="city"
                                                required></select>
                                    </div>
                                </div>
                                <br>
                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="driver_image"
                                               id="driver_image"
                                               accept="image/*">
                                        <label class="custom-file-label" for="driver_image">Choose image...</label>
                                    </span>
                                </span>
                                <br><br>
                                <br><br><br>

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
