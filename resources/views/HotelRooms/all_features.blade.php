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
                                        <a href="{{route('room.features.view')}}" class="btn btn-primary">+ Add Features</a>
                                    </span>

                                    <form action="{{route('features.search')}}" method="get">
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
                                                <th>Room No</th>
                                                <th>Feature Title</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($allRoomFeatures as $allRoomFeature)
                                                <tr>
                                                    <td>{{$allRoomFeature->id}}</td>
                                                    <td>
                                                        <strong> {{$allRoomFeature->room_title}}</strong>
                                                    </td>
                                                    <td>{{$allRoomFeature->room_no}}</td>
                                                    <td>{{$allRoomFeature->feature_title}}</td>
                                                    <td>{{$allRoomFeature->price}}</td>

                                                    <td>
                                                        <a href="{{route('features.edit', $allRoomFeature->id)}}"
                                                           class="btn btn-sm btn-primary"><i
                                                                class="icon-pencil"></i></a>

                                                        <a href="{{route('features.delete', $allRoomFeature->id)}}"
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
