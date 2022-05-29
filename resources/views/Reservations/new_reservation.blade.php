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
                            <h4 class="card-title text-left">Add New Reservation</h4>
                        </div>

                        <div class="card-body">
                            <form class="form was-validated" action="{{route('reservation.add')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <label for="">Check in Date and Time</label>
                                        <input type="datetime-local" name="check_in_date_time"
                                               class="border-radius-text form-control"
                                               value="{{Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')}}"
                                               min="2000-01-12T00:00" max="2050-12-12T00:00" required>
                                        <div class="invalid-feedback">
                                            Please provide check in date time...
                                        </div>
                                    </div>


                                    <div class="col">
                                        <label for="">Check out Date and Time</label>
                                        <input type="datetime-local" name="check_out_date_time"
                                               class="border-radius-text form-control"
                                               value="{{Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')}}"
                                               min="2000-01-12T00:00" max="2050-12-12T00:00" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide check out date time...
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control" name="client_id" id="customer">
                                            <option selected value="">Select Customer...</option>

                                            @forelse($allCustomers as $allCustomer)
                                                <option
                                                    value="{{$allCustomer->id}}">{{$allCustomer->first_name . ' ' . $allCustomer->last_name}}</option>
                                            @empty
                                                <option value="">No Customer Added</option>
                                            @endforelse

                                        </select>
                                    </div>


                                    <div class="col">
                                        {{--                                        <label for="customer_cnic">Customer CNIC</label>--}}

                                        <select class="border-radius-text form-control" name="customer_cnic"
                                                id="customer_cnic" required></select>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="Number" class="border-radius-text form-control" name="no_of_adults"
                                               placeholder="Please enter no of adults" required>
                                        <div class="invalid-feedback">
                                            Please provide no of adults...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="Number" class="border-radius-text form-control" name="no_of_childs"
                                               placeholder="Please enter no of childs" required>
                                        <div class="invalid-feedback">
                                            Please provide no of childs...
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="Number" class="border-radius-text form-control" name="no_of_rooms"
                                               placeholder="Please enter no of rooms" required>
                                        <div class="invalid-feedback">
                                            Please provide no of rooms...
                                        </div>
                                    </div>

                                    <div class="col">
                                        <select class="border-radius-text form-control" name="status" required>
                                            <option selected value="1">Active</option>
                                            <option value="1">Active</option>
                                            <option value="0">In Active</option>
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <input type="text-area" class="border-radius-text form-control"
                                               name="description"
                                               placeholder="Please enter description...">
                                    </div>
                                </div>
                                <br>


                                <div class="card-body">
                                    <div class="table-repsonsive">
                                        <span id="error"></span>

                                        <table class="table display text-center" id="item_table">
                                            <tr>
                                                <th>Room Title</th>
                                                <th>
                                                    <button type="button" name="add"
                                                            class="btn btn-success btn-sm add">
                                                        <i
                                                            class="fas fa-plus"></i></button>
                                                </th>
                                            </tr>
                                        </table>
                                        <br>

                                        <div class="text-right">
                                            <button type="submit"
                                                    class="btn btn-success btn-lg col-lg-2 text-center">Save<span
                                                    class="btn-icon-right"><i class="fa fa-upload"></i></span>
                                            </button>
                                        </div>
                                        <br><br><br>
                                    </div>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script>
        $(document).ready(function () {

            var count = 0;

            function add_input_field(count) {

                var html = '';

                html += '<tr>';

                html += '<td><select name="room_title[]" id="room_title" class="form-control selectpicker" data-live-search="true" style="width: 120px; margin-top: 2px;"> @forelse($allRooms as $allRoom) <option value="{{$allRoom->id}}">{{$allRoom->room_title}}</option> @empty <option value="">No Room Found!</option>@endforelse </select></td>';

                // html += '<td><input type="number" name="feature_price[]" id="feature_price" class="border-radius-text form-control feature_price" style="width: 120px; height: 2px;" /></td>';

                // html += '<td><input type="text" name="item_quantity[]" class="border-radius-text form-control item_quantity" /></td>';


                var remove_button = '';

                if (count > 0) {
                    remove_button = '<button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button>';
                }

                html += '<td>' + remove_button + '</td></tr>';

                return html;

            }

            $('#item_table').append(add_input_field(0));

            $('.selectpicker').selectpicker('refresh');

            $(document).on('click', '.add', function () {

                count++;

                $('#item_table').append(add_input_field(count));

                $('.selectpicker').selectpicker('refresh');

            });

            $(document).on('click', '.remove', function () {

                $(this).closest('tr').remove();

            });
        });
    </script>


    {{--    Customer Name wise CNIC--}}
    <script>
        $(document).ready(function () {
            $("#customer").change(function () {
                let customerId = this.value;

                $.get('/get_customer_cnic?customer=' + customerId, function (data) {
                    $("#customer_cnic").html(data);
                })
            })
        })

    </script>

@endsection


