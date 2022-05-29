@extends('layouts.layout')
@section('content')

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
                            <h4 class="card-title">All Transportation Feature Title List</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Transportation Feature Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($transportationtitles as $transportationtitle)
                                        <tr>
                                            <td>{{$transportationtitle->id}}</td>
                                            <td>{{$transportationtitle->transportation_feature_title}}</td>
                                            <td>
                                                <a href="{{route('transportation.title.edit',$transportationtitle->id)}}"
                                                   class="btn btn-sm btn-primary"><i
                                                        class="icon-pencil"></i></a>

                                                <a href="{{route('tansportationfeature.title.delete', $transportationtitle->id)}}"
                                                   onclick="return confirm('Are you sure to want to delete it?')"
                                                   class="btn btn-sm btn-danger"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <h3>No Transportation Feature Title Found</h3>
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
