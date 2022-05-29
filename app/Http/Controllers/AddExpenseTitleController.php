<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\ExpenseTitle;

class AddExpenseTitleController extends Controller
{
    public function ShowExpenseTitle()
    {


        return view('Expense.add_expense_title');

    }

    public function store(Request $request)
        {
            $expensetitle = new ExpenseTitle();
            $expensetitle->expense_title = $request->expense_title;
            $expensetitle->save();
            Session::flash('success','Your Title is Saved Succesfully ');
            return redirect(route('show.expense'));
        }

}
