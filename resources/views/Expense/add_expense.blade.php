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
                            <h4 class="card-title text-left">Add Expense Title </h4>
                            <span class="text-right">
                                        <a href="{{route('add.title')}}" class="btn btn-primary ">+ Expense Title</a>
                            </span>
                            {{--                            <a href="{{route('add.title')}}" class="btn btn-primary card-title text-right" >+ Expense Title</a>--}}


                        </div>
                        <div class="card-body">
                            <form class="form was-validated" action="{{route('store.expense')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <select class="border-radius-text form-control"
                                                name="expence_title_id" required>
                                            <option selected value="">Select Expense Title...</option>

                                            @forelse($expenseTitles as $title)
                                                <option value="{{$title->id}}">{{$title->expense_title}}</option>
                                            @empty
                                                <option value="">No Expense Title Added</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <br><br>


                                <div class="row">
                                    <div class="col">
                                        <input type="datetime-local" class="border-radius-text form-control"
                                               placeholder="Date and Time" value="{{Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')}}"
                                               name="expense_date_time" min="2000-01-12T00:00" max="2050-12-12T00:00"
                                               required>
                                        <div class="invalid-feedback">
                                            Date and Time...
                                        </div>

                                    </div>

                                    <div class="col">
                                        <input type="number" class="border-radius-text form-control"
                                               placeholder="Expense Amount"
                                               name="expense_amount" required>
                                        <div class="invalid-feedback">
                                            Expense Amount...
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="border-radius-text form-control"
                                               placeholder="Description"
                                               name="expense_description">
                                        <div class="invalid-feedback">
                                            Descritpion...
                                        </div>
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
    <!-- #/ container -->
    <!--**********************************
        Content body end
    ***********************************-->
@endsection


