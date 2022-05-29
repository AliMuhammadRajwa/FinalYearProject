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
                            <h4 class="card-title">All Bed Type List</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Bed Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($BedTypes as $BedType)
                                        <tr>
                                            <td>{{$BedType->id}}</td>
                                            <td>{{$BedType->bed_type}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <h3>No Bed Type Found</h3>
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
