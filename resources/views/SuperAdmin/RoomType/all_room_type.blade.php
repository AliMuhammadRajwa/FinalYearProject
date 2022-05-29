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
                            <h4 class="card-title">All Room Type List</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Room Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($roomTypes as $roomType)
                                        <tr>`
                                            <td>{{$roomType->id}}</td>
                                            <td>{{$roomType->room_type}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <h3>No Room Type Found</h3>
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
