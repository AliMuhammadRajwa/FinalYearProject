@extends('layouts.layout')
@section('content')

    <!--**********************************
            Page Styling
     ***********************************-->

    <style>
        .border-radius-text {
            border-radius: 5px;
        }

    </style>



    <!--**********************************
            Content body start
     ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header text-right">
                            <h4 class="card-title text-left">Add Check Out Details </h4>

                        </div>


                        <div class="card-body">
                            <form class="form was-validated" method="post" action="{{route('hotel.payments.store', [$getReservationId->id, $ClientId->id])}}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <label for="customer_name">Customer Name</label>

                                        <input type="text" class="border-radius-text form-control" id="customer_name"
                                               name="customer_name"
                                               value="{{$ClientId->first_name . ' ' . $ClientId->last_name}}" readonly>
                                    </div>


                                    <div class="col">
                                        <label for="customer_cnic">Customer CNIC</label>

                                        <input type="text" class="border-radius-text form-control" id="customer_cnic"
                                               name="customer_cnic" value="{{$ClientId->cnic}}" readonly>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <label for="check_in_date_time">Check in Date and Time</label>

                                        <input type="datetime-local" name="check_in_date_time" id="check_in_date_time"
                                               class="border-radius-text form-control" value="{{$checkInDateTime}}"
                                               readonly>
                                    </div>


                                    <div class="col">
                                        <label for="check_out_date_time">Check out Date and Time</label>

                                        <input type="datetime-local" name="check_out_date_time" id="check_out_date_time"
                                               class="border-radius-text form-control" value="{{$checkOutDateTime}}"
                                               readonly>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <label for="total_adults">Total Adults</label>

                                        <input type="text" class="border-radius-text form-control" id="total_adults"
                                               name="total_adults" value="{{$getReservationId->no_of_adults}}" readonly>
                                    </div>


                                    <div class="col">
                                        <label for="total_childs">Total Childs</label>

                                        <input type="text" class="border-radius-text form-control" id="total_childs"
                                               name="total_childs" value="{{$getReservationId->no_of_childs}}" readonly>
                                    </div>

                                    <div class="col">
                                        <label for="total_rooms">Reserved Rooms</label>

                                        <input type="text" class="border-radius-text form-control" id="total_rooms"
                                               name="total_rooms" value="{{$getReservationId->no_of_rooms}}" readonly>

                                        <div class="invalid-feedback">
                                            Please provide room title...
                                        </div>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <label for="total_amount">Total Amount</label>

                                        <input type="number" class="border-radius-text form-control"
                                               id="total_amount" onkeyup="sum()"
                                               name="total_amount" value="{{$totalAmountDB}}" required>
                                    </div>


                                    <div class="col">
                                        <label for="other_amount">Other Amount</label>
                                        <input type="number"   class="border-radius-text form-control"
                                               placeholder="Others Amount" id="other_amount" onkeyup="sum()"
                                               name="other_amount">
                                    </div>


                                    <div class="col">
                                        <label for="discount_amount">Discount Amount</label>
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Discount" id="discount_amount" onkeyup="sum()"
                                               name="discount_amount">
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <label for="amount_due">Amount Due</label>
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Amount Due" id="amount_due"
                                               name="amount_due" value="{{$totalAmountDB}}" readonly>
                                    </div>


                                    <div class="col">
                                        <label for="paid_amount">Paid Amount</label>
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Paid Amount..." id="paid_amount" onkeyup="sum()"
                                               name="paid_amount" required>
                                    </div>


                                    <div class="col">
                                        <label for="credit_amount">Credited Amount</label>
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Credited Amount" id="credit_amount"
                                               name="credit_amount" readonly>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <label for="description">Description</label>
                                        <input type="text-area" class="border-radius-text form-control"
                                               name="description" id="description" value=""
                                               placeholder="Please enter description...">
                                    </div>
                                </div>
                                <br><br><br>


                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table display">

                                            <thead>
                                            <tr>
                                                <th>S#</th>
                                                <th>Room Title</th>
                                                <th>Room No</th>
                                                <th>Room Price</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($RoomId as $Rooms)
                                                <tr>
                                                    <td>{{$Rooms->id}}</td>
                                                    <td>
                                                        <strong> {{$Rooms->room_title}}</strong>
                                                    </td>
                                                    <td>{{$Rooms->room_no}}</td>
                                                    <td>{{$Rooms->total_price}}</td>

                                                    @if($Rooms->status =='1')
                                                        <td><strong>Active</strong></td>
                                                    @else
                                                        <td><strong>In Active</strong></td>
                                                    @endif
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
                                <br><br>
                                <div class="text-right">
                                    <button type="submit"
                                            class="btn btn-success btn-lg col-lg-2 text-center">Save<span
                                            class="btn-icon-right"><i class="fa fa-upload"></i></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Content body end
    ***********************************-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>


    {{--    --}}{{--    Customer Name wise CNIC--}}
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $("#customer").change(function () {--}}
    {{--                let customerId = this.value;--}}

    {{--                $.get('/get_customer_cnic?customer=' + customerId, function (data) {--}}
    {{--                    $("#customer_cnic").html(data);--}}
    {{--                })--}}
    {{--            })--}}
    {{--        })--}}

    {{--    </script>--}}


    {{--    --}}{{--    Customer Name and CNIC wise reservation details--}}
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $("#customer_cnic").change(function () {--}}
    {{--                let customer_cnic_Id = this.value;--}}

    {{--                $.get('/get_customer_reservation_details?customerCnic=' + customer_cnic_Id, function (data) {--}}
    {{--                    $("#check_in_date_time").html(data);--}}
    {{--                    $("#check_out_date_time").html(data);--}}
    {{--                })--}}
    {{--            })--}}
    {{--        })--}}

    {{--    </script>--}}



    <script type="text/javascript">
        function sum() {
            var txt_total_amount = document.getElementById('total_amount').value;
            var txt_other_amount = document.getElementById('other_amount').value;
            var txt_discount_amount = document.getElementById('discount_amount').value;
            var txt_paid_amount = document.getElementById('paid_amount').value;

            if (txt_total_amount == '') {
                txt_total_amount = 0;
            }

            if (txt_other_amount == '') {
                txt_other_amount = 0;
            }

            if (txt_discount_amount == '') {
                txt_discount_amount = 0;
            }

            if (txt_paid_amount == '') {
                txt_paid_amount = 0;
            }

            var result = (parseFloat(txt_total_amount) + parseFloat(txt_other_amount)) - parseFloat(txt_discount_amount);
            var credits = result - txt_paid_amount;

            if (!isNaN(result)) {
                document.getElementById('amount_due').value = result;
                document.getElementById('credit_amount').value = credits;
            }
        }
    </script>

@endsection
