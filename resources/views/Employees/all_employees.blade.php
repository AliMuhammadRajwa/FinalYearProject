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
                                    <h4 class="card-title text-left">All Employees List </h4>

                                    <span class="text-right">
                                        <a href="{{route('add.employee')}}" class="btn btn-primary">+ Add new</a>
                                    </span>

                                    <form action="{{route('search.employees')}}" method="get">
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
                                        <table class="table display" style="min-width: 845px">

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

                                            @forelse($allEmployees as $all_employees)
                                                <tr>
                                                    <td>{{$all_employees->id}}</td>
                                                    <td>
                                                        <img class="rounded-circle" width="60" height="60" src="{{asset('img/' . $all_employees->file_name)}}" alt="No Image">
                                                    </td>
                                                    <td><strong>{{$all_employees->first_name . ' ' . $all_employees->last_name}}</strong></td>
                                                    <td>{{$all_employees->cnic}}</td>
                                                    <td>{{$all_employees->gender_name}}</td>
                                                    <td>{{$all_employees->country_name}}</td>
                                                    <td>{{$all_employees->province_name}}</td>
                                                    <td>{{$all_employees->city_name}}</td>
                                                    <td>{{$all_employees->contact}}</td>
                                                    <td>{{$all_employees->permanent_address}}</td>
                                                    <td>{{$all_employees->email}}</td>

                                                    @if($all_employees->isActive =='1')
                                                        <td><strong>Active</strong></td>
                                                    @else
                                                        <td><strong>In Active</strong></td>
                                                    @endif

                                                    <td>
                                                        <a href="{{route('fill.employee', $all_employees->id)}}" class="btn btn-sm btn-primary"><i
                                                                class="icon-pencil"></i></a>

                                                        <a href="{{route('delete.employee',$all_employees->id)}}"
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
