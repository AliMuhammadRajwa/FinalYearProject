@extends('layouts.layout')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                {{--                                Search Engine part--}}

                                <div class="card-header text-right">
                                    <h4 class="card-title text-left">All Rooms List </h4>

                                    <span class="text-right">
                                        <a href="{{route('room.view')}}" class="btn btn-primary">+ Add new</a>
                                    </span>

                                    <form action="{{route('search.rooms')}}" method="get">
                                        <div class="">
                                            <div class="input-group-prepend">
                                                <input type="search" style="border-radius: 20px; width: 350px;  margin-right: 14px;"
                                                       name="search" placeholder="Search..." class="form-control">

                                                <span class="input-group-prepend">
                                                        <button type="submit" class="btn btn-primary" hidden>Search</button>
                                                    </span>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{--                               End Search Engine part--}}

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table display">

                                            <thead>
                                            <tr>
                                                <th>S#</th>
                                                <th>Room Title</th>
                                                <th>Room #</th>
                                                <th>Room Type</th>
                                                <th>Bed Type</th>
                                                <th>Room Size</th>
                                                <th>Room Price</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($allRooms as $allRoom)
                                                <tr>
                                                    <td>{{$allRoom->id}}</td>
                                                    <td>
                                                        <strong> {{$allRoom->room_title}}</strong>
                                                    </td>
                                                    <td>{{$allRoom->room_no}}</td>
                                                    <td>{{$allRoom->room_type}}</td>
                                                    <td>{{$allRoom->bed_type}}</td>
                                                    <td>{{$allRoom->room_size}}</td>
                                                    <td>{{$allRoom->total_price}}</td>
                                                    <td>{{$allRoom->description}}</td>

                                                    @if($allRoom->status =='1')
                                                        <td><strong>Active</strong></td>
                                                    @else
                                                        <td><strong>In Active</strong></td>
                                                    @endif

                                                        <td>
                                                            <a href="{{route('room.details', $allRoom->id)}}"
                                                               class="btn btn-sm btn-primary"><i
                                                                    class="icon-pencil"></i></a>

                                                            <a href=""
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
