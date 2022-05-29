@extends('SuperAdmin.SuperAdminLayout.Super_Admin_Layout')
@section('Super_content')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form" method="post" action="{{route('country.add')}}">
                                    @csrf

                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control"
                                                   placeholder="Please enter country title..." name="country_name"
                                                   required>
                                            <div class="invalid-feedback">
                                                Please provide country title...
                                            </div>
                                        </div>
                                    </div>
                                    <br>

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
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection
