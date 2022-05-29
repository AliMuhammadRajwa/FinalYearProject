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
                                    <h4 class="card-title text-left">Expenses List </h4>

                                    <span class="text-right">
                                        <a href="{{route('show.expense')}}" class="btn btn-primary">+ Add new</a>
                                    </span>

                                    <form action="{{route('expenses.search')}}" method="get">
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
                                                <th>Date and Time</th>
                                                <th>Expense Title</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @forelse($allExpenses as $allExpense)
                                                <tr>
                                                    <td>{{$allExpense->id}}</td>
                                                    <td>{{$allExpense->date_time}}</td>
                                                    <td>{{$allExpense->expense_title}}</td>
                                                    <td>{{$allExpense->expense_amount}}</td>
                                                    <td>{{$allExpense->description}}</td>



                                                    <td>
                                                        <a href="{{route('edit.expenses', $expense->id)}}" class="btn btn-sm btn-primary"><i
                                                                class="icon-pencil"></i></a>

                                                        <a href="{{route('delete.expense',$expense->id)}}"
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
