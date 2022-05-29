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
                                    <h4 class="card-title text-left">Hotel Details </h4>

                                    {{--                                    <span class="text-right">--}}
                                    {{--                                        <a href="" class="btn btn-primary">+ Add new</a>--}}
                                    {{--                                    </span>--}}

                                    <form action="{{route('search.hotel')}}" method="get">
                                        <div class="">
                                            <div class="input-group-prepend">
                                                <input type="search" style="border-radius: 20px; width: 350px;  margin-right: 14px;"
                                                       name="search" placeholder="Search..." class="form-control">

                                                <span class="input-group-prepend">
                                                        <button type="submit"
                                                                class="btn btn-primary" style="border-radius: 7px; width: 100px;" hidden>Search</button>
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
                                                <th>Hotel Title</th>
                                                <th>Hotel Code</th>
                                                <th>Contact No</th>
                                                <th>Email</th>
                                                <th>Web-Site</th>
                                                <th>Facebook</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($hotelDetails as $hotelDetail)
                                                <tr>
                                                    <td>{{$hotelDetail->id}}</td>
                                                    <td>
                                                        <strong> {{$hotelDetail->hotel_title}}</strong>
                                                    </td>
                                                    <td>{{$hotelDetail->hotel_code}}</td>
                                                    <td>{{$hotelDetail->contact_no}}</td>
                                                    <td>{{$hotelDetail->email}}</td>
                                                    <td>{{$hotelDetail->website_url}}</td>
                                                    <td>{{$hotelDetail->facebook_url}}</td>
                                                    <td>{{$hotelDetail->description}}</td>

                                                    @if($hotelDetail->status =='1')
                                                        <td><strong>Active</strong></td>
                                                    @else
                                                        <td><strong>In Active</strong></td>
                                                    @endif

                                                    <td>
                                                        <a href="{{route('hotel.details', $hotelDetail->id)}}"
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
