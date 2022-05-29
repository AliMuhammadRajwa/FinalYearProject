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
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header text-right">
                                    <h4 class="card-title text-left">Add Room Features </h4>

                                    <span class="text-right" style="margin-right: 10px;">
                                        <a href="{{route('features.title.view')}}"
                                           class="btn btn-primary">+ Add Title</a>
                                    </span>
                                    <br><br>
                                </div>


                                <form id="insert_form" class="form was-validated" action="{{route('features.store')}}" method="post" >
                                    @csrf

                                    <div class="card-header text-right">
                                        <div class="row">
                                            <div class="col">
                                                <select class="border-radius-text  form-control" name="room_id"
                                                        id="room_id"
                                                        required>
                                                    <option selected value="">Select Room Title...</option>

                                                    @forelse($allRooms as $allRoom)
                                                        <option
                                                            value="{{$allRoom->id}}">{{$allRoom->room_title}}</option>
                                                    @empty
                                                        <option value="">No Room Type Added</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div class="table-repsonsive">
                                            <span id="error"></span>

                                            <table class="table display " id="item_table">
                                                <tr>
                                                    <th>Feature Title</th>
                                                    <th>Rate</th>
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
                                                <button type="submit" class="btn btn-success col-sm-2 text-center"
                                                        style="margin-right: 15px;" name="submit" id="submit_button">Save<span
                                                        class="btn-icon-right"><i class="fa fa-upload"></i></span>
                                                </button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                </form>
                            </div>
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

                html += '<td><select name="feature_title[]" id="feature_title" class="form-control selectpicker" data-live-search="true" style="width: 120px; margin-top: 2px;"> @forelse($allFeaturesTitle as $allFeaturesTitle) <option value="{{$allFeaturesTitle->id}}">{{$allFeaturesTitle->feature_title}}</option> @empty <option value="">No Feature Found!</option>@endforelse </select></td>';

                html += '<td><input type="number" name="feature_price[]" id="feature_price" class="border-radius-text form-control feature_price" style="width: 120px; height: 2px;" /></td>';

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

@endsection
