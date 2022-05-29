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
                                    <h4 class="card-title text-left">Check Out </h4>

                                    <span class="text-right">
                                        <a href="{{route('reservation.view')}}" class="btn btn-primary">+ Add new</a>
                                    </span>

                                    <form action="{{route('reservation.search')}}" method="get">
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
                                                <th>Customer</th>
                                                <th>CNIC</th>
                                                <th>Contact No</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Total Adults</th>
                                                <th>Total Childs</th>
                                                <th>Reserved Rooms</th>
                                                <th>Description</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($allReservations as $allReservation)
                                                <tr>
                                                    <td>{{$allReservation->id}}</td>
                                                    <td>
                                                        <strong> {{$allReservation->first_name . ' ' . $allReservation->last_name }}</strong>
                                                    </td>
                                                    <td>{{$allReservation->cnic}}</td>
                                                    <td>{{$allReservation->contact}}</td>
                                                    <td>{{$allReservation->check_in_date_time}}</td>
                                                    <td>{{$allReservation->check_out_date_time}}</td>
                                                    <td>{{$allReservation->no_of_adults}}</td>
                                                    <td>{{$allReservation->no_of_childs}}</td>
                                                    <td>{{$allReservation->no_of_rooms}}</td>
                                                    <td>{{$allReservation->description}}</td>
                                                    <td>{{$allReservation->total_amount}}</td>

                                                    @if($allReservation->status =='1')
                                                        <td><strong>Active</strong></td>
                                                    @else
                                                        <td><strong>In Active</strong></td>
                                                    @endif

                                                    <td>
                                                        <a href="{{route('reservation.checkout.add', [$allReservation->id, $allReservation->client_id])}}"
                                                           class="btn btn-sm btn-danger"> Check Out <i
                                                                class="icon-arrow-right-circle"></i></a>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="{{route('reservation.checkout.print', [$allReservation->id, $allReservation->client_id])}}"
                                                           class="btn btn-sm btn-danger"> Print <i
                                                                class="icon-arrow-right-circle"></i></a>
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
