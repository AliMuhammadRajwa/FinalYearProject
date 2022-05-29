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
                            <h4 class="card-title text-left">Add New Transport Company </h4>
                            <span class="text-right" style="">
                                        <a href="{{route('country.view')}}"
                                           class="btn btn-primary" style="font-size: small ">+ Country </a>
                                    </span>
                            <span class="text-right" style="">
                                        <a href="{{route('province.view')}}"
                                           class="btn btn-primary" style="font-size: small">+ Province </a>
                                    </span>
                            <span class="text-right" style="">
                                        <a href="{{route('city.view')}}"
                                           class="btn btn-primary"
                                           style="height: 36px;width: 100px; margin-right: 10px; font-size: small">+ City </a>
                                    </span>
                        </div>

                        <div class="card-body">

                            <form class="form was-validated" action="{{route('add_company.detail')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter company title..."
                                               name="company_title"
                                               value="{{old('company_title')}}"
                                               required>
                                        @if($errors->has('company_title'))
                                            <span class="text-danger">{{ $errors->first('company_title') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please Provide Hotel Title ...
                                        </div>
                                    </div>


                                    <div class="col">
                                        <input type="email" class="border-radius-text form-control"
                                               placeholder="Please enter email"
                                               name="company_email"
                                               value="{{old('company_email')}}"
                                               required>
                                        @if($errors->has('company_email'))
                                            <span class="text-danger">{{ $errors->first('company_email') }}</span>
                                        @endif
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
                                               name="company_contact"
                                               value="{{old('company_contact')}}"
                                               required>
                                        @if($errors->has('company_contact'))
                                            <span class="text-danger">{{ $errors->first('company_contact') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please Provide Contact #...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="country_id" id="country"
                                                required>
                                            <option selected value="">Select Country...</option>

                                            @forelse($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @empty
                                                <option value="">No Countries Added</option>
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
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter hotel Website link"
                                               name="company_web">
                                    </div>

                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter hotel FB Link"
                                               name="company_facebook">
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter company address..."
                                               name="company_address"
                                               value="{{old('company_address')}}"
                                               required>
                                        @if($errors->has('company_address'))
                                            <span class="text-danger">{{ $errors->first('company_address') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please Provide Hotel Address...
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Please enter company description..."
                                               value="{{old('company_description')}}" name="company_description"
                                        >
                                        @if($errors->has('company_description'))
                                            <span class="text-danger">{{ $errors->first('company_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="status">
                                            <option selected value="1">Active</option>
                                            <option value="1">Active</option>
                                            <option value="0">In Active</option>
                                        </select>
                                    </div>
                                </div>
                                <br><br>


                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="logo" id="logo"
                                               accept="image/*">
                                        <label class="custom-file-label" for="logo">Choose Logo...</label>
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

    {{--    Country wise Provinces--}}
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


    {{--    Province wise cities--}}
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
