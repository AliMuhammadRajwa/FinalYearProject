@extends('layouts.layout')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                {{--                                Search Engine part--}}

                                <div class="card-header text-right">
                                    <h4 class="card-title text-left">All Vehicle List </h4>

{{--                                    <span class="text-right">--}}
{{--                                        <a href="{{route('add.employee')}}" class="btn btn-primary">+ Add new</a>--}}
{{--                                    </span>--}}

{{--                                    <form action="{{route('search.employees')}}" method="get">--}}
{{--                                        <div class="">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <input type="search" style="border-radius: 20px; width: 350px;  margin-right: 14px;"--}}
{{--                                                       name="search" placeholder="Search..." class="form-control">--}}

{{--                                                <span class="input-group-prepend">--}}
{{--                                                        <button type="submit" class="btn btn-primary" hidden>Search</button>--}}
{{--                                                    </span>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}

                                {{--                               End Search Engine part--}}

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table display" style="min-width: 845px">

                                            <thead>
                                            <tr>
                                                <th>S#</th>
                                                <th>Image</th>
                                                <th>Vehicle Title</th>
                                                <th>Vehicle No</th>
                                                <th>Model</th>
                                                <th>Color</th>
                                                <th>Tracker No</th>
                                                <th>Condition</th>
                                                <th>Description</th>
                                                <th>Vehicle Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @forelse($vehicleDetails as $all_vehicle)
                                                <tr>
                                                    <td>{{$all_vehicle->id}}</td>
                                                    <td>
                                                        <img class="rounded-circle" width="60" height="60" src="{{asset('img/' . $all_vehicle->file_name)}}" alt="No Image">
                                                    </td>
                                                    <td>{{$all_vehicle->vehicle_title}}</td>
                                                    <td>{{$all_vehicle->vehicle_no}}</td>
                                                    <td>{{$all_vehicle->model}}</td>
                                                    <td>{{$all_vehicle->color}}</td>
                                                    <td>{{$all_vehicle->tracker_no}}</td>
                                                    <td>{{$all_vehicle->condition}}</td>
                                                    <td>{{$all_vehicle->description}}</td>
                                                    <td>{{$all_vehicle->vehicle_type_id}}</td>

                                                    @if($all_vehicle->isActive =='1')
                                                        <td><strong>Active</strong></td>
                                                    @else
                                                        <td><strong>In Active</strong></td>
                                                    @endif

                                                    <td>
                                                        <a href="{{route('fill.vehicle.details', $all_vehicle->id)}}" class="btn btn-sm btn-primary"><i
                                                                class="icon-pencil"></i></a>

                                                        <a href="{{route('delete.Vehicle.details',$all_vehicle->id)}}"
                                                           onclick="return confirm('Are you sure to want to delete it?')"
                                                           class="btn btn-sm btn-danger"><i class="icon-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">No Records Found...</td>
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
            </div>
        </div>
@endsection
