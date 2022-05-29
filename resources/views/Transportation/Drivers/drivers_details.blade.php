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
                                    <h4 class="card-title text-left">Drivers Details </h4>
                                    <form action="" method="get">
                                        <div class="">
                                            <div class="input-group-prepend">
                                                <input type="search"
                                                       style="border-radius: 20px; width: 350px;  margin-right: 14px;"
                                                       name="search" placeholder="Search..." class="form-control">

                                                <span class="input-group-prepend">
                                                        <button type="submit"
                                                                class="btn btn-primary"
                                                                style="border-radius: 7px; width: 100px;"
                                                                hidden>Search</button>
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
                                                <th>Driver's Photo</th>
                                                <th>Driver's Name</th>
                                                <th>Driver's CNIC</th>
                                                <th>Contact No</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($allCompanyDrivers as $companyDetail)
                                                <tr>
                                                    <td>{{$companyDetail->id}}</td>
                                                    <td><img class="rounded-circle" width="60" height="60"
                                                             src="{{asset('img/' . $companyDetail->file_name)}}"
                                                             alt="No Image"></td>
                                                    <td>
                                                        <strong> {{$companyDetail->first_name . ' ' . $companyDetail->last_name}}</strong>
                                                    </td>
                                                    <td>{{$companyDetail->cnic}}</td>
                                                    <td>{{$companyDetail->contact_no}}</td>
                                                    <td>{{$companyDetail->email}}</td>
                                                    <td>{{$companyDetail->address}}</td>
                                                    <td>{{$companyDetail->gender_name}}</td>

                                                    @if($companyDetail->status =='1')
                                                        <td><strong>Active</strong></td>
                                                    @else
                                                        <td><strong>In Active</strong></td>
                                                    @endif

                                                    <td>
                                                        <a href="{{route('driver.edit', $companyDetail->id)}}"
                                                           class="btn btn-sm btn-primary"><i
                                                                class="icon-pencil"></i></a>

                                                        <a href="{{route('delete.driver' , $companyDetail->id)}}"
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
