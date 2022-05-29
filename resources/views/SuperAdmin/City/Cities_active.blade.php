@extends('SuperAdmin.SuperAdminLayout.Super_Admin_Layout')
@section('Super_content')

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">

        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Active Countries List</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @forelse($cities as $city)
                                       <tr>
                                           <td>{{$city->id}}</td>
                                           <td>{{$city->city_name}}</td>
                                           <td>{{$city->isActive}}</td>
                                       </tr>
                                   @empty
                                       <tr>
                                           <h3>No City Found</h3>
                                       </tr>
                                   @endforelse
                                    </tbody>
                                </table>
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
