@extends('layouts.layout')
@section('content')
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
                        </div>

                        <div class="card-body">
                            <form class="form was-validated" action="{{route('store.title')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Expense Title"
                                               name="expense_title" required>
                                        <div class="invalid-feedback">
                                            Add Expense Title...
                                        </div>
                                    </div>
                                </div>
                                <br>
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
