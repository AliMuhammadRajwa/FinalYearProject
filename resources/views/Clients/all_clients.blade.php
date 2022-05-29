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
                                    <h4 class="card-title text-left">All Customers List </h4>

                                    <span class="text-right">
                                        <a href="{{route('add.client')}}" class="btn btn-primary">+ Add new</a>
                                    </span>

                                    <form action="{{route('search.clients')}}" method="get">
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
                                                <th>Image</th>
                                                <th>Full Name</th>
                                                <th>CNIC</th>
                                                <th>Gender</th>
                                                <th>Country</th>
                                                <th>Province</th>
                                                <th>City</th>
                                                <th>Contact #</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($allClients as $all_client)
                                                <tr>
                                                    <td>{{$all_client->id}}</td>
                                                    <td>
                                                        <img class="rounded-circle" width="60" height="60"
                                                             src="{{asset('img/' . $all_client->file_name)}}"
                                                             alt="No Image">
                                                    </td>
                                                    <td>
                                                        <strong> {{$all_client->first_name . ' ' . $all_client->last_name}}</strong>
                                                    </td>
                                                    <td>{{$all_client->cnic}}</td>
                                                    <td>{{$all_client->gender_name}}</td>
                                                    <td>{{$all_client->country_name}}</td>
                                                    <td>{{$all_client->province_name}}</td>
                                                    <td>{{$all_client->city_name}}</td>
                                                    <td>{{$all_client->contact}}</td>
                                                    <td>{{$all_client->permanent_address}}</td>
                                                    <td>{{$all_client->email}}</td>

                                                    @if($all_client->isActive =='1')
                                                        <td><strong>Active</strong></td>
                                                    @else
                                                        <td><strong>In Active</strong></td>
                                                    @endif

                                                    <td>
                                                        <a href="{{route('fill.client', $all_client->id)}}"
                                                           class="btn btn-sm btn-primary"><i
                                                                class="icon-pencil"></i></a>

                                                        <a href="{{route('delete.client',$all_client->id)}}"
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
