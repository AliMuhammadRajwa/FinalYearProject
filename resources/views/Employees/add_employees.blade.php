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
                            <h4 class="card-title text-left">Add New Employee </h4>
                            <span class="text-right" style="">
                                        <a href="{{route('country.view')}}"
                                           class="btn btn-primary" style="font-size: small">+ Country </a>
                                    </span>
                            <span class="text-right" style="">
                                        <a href="{{route('province.view')}}"
                                           class="btn btn-primary" style="font-size: small">+ Province </a>
                                    </span>
                            <span class="text-right" style="">
                                        <a href="{{route('city.view')}}"
                                           class="btn btn-primary" style="height: 36px;width: 100px; margin-right: 10px; font-size: small">+ City </a>
                                    </span>
                        </div>

                        <div class="card-body">
                            <form class="form was-validated" action="{{route('employee.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text border-radius-text form-control" placeholder="Enter First name"
                                               name="first_name"
                                               value="{{old('first_name')}}"
                                               required>
                                        @if($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide first name...
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" placeholder="Enter Last name"
                                               name="last_name"
                                               value="{{old('last_name')}}"
                                               required>
                                        @if($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide last name...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control" placeholder="Enter CNIC #"
                                               name="cnic"
                                               value="{{old('cnic')}}"
                                               required>
                                        @if($errors->has('cnic'))
                                            <span class="text-danger">{{ $errors->first('cnic') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide cnic #...
                                        </div>
                                    </div>

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
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="country_id" id="country" required>
                                            <option selected value="">Select Country...</option>

                                            @forelse($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @empty
                                                <option value="">No Counties Added</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="province_id" id="province" required></select>
                                    </div>
                                </div>
                                <br><br>

                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="city_id" id="city" required></select>
                                    </div>

                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control" placeholder="Enter Contact #"
                                               name="contact"\
                                               value="{{old('contact')}}"
                                               required>
                                        @if($errors->has('contact'))
                                            <span class="text-danger">{{ $errors->first('contact') }}</span>
                                        @endif
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
                                               value="{{old('permanent_address')}}"
                                               required>
                                        @if($errors->has('permanent_address'))
                                            <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide permanent address...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" placeholder="Enter Email Address"
                                               name="email"
                                               value="{{old('email')}}"
                                               required>
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please provide email address...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <select id="inputState" class="border-radius-text form-control" name="status" required>
                                            <option selected value="">Select Status...</option>
                                            <option value="1">Active</option>
                                            <option value="0">In Active</option>
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control" placeholder="Description..."
                                               name="description"
                                        value="{{old('description')}}"
                                        >
                                        @if($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <br><br>


                                <span class="mt-5" style="max-width: 100%;">
                                    <span class="custom-file">
                                        <input type="file" class="custom-file-input" name="image"  id="image"
                                               accept="image/*">
                                        <label class="custom-file-label" for="logo">Choose Image...</label>
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
