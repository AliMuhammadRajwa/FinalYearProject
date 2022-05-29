<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\ExpenseTitle;
use App\Models\ExpenseDetail;


class AddExpenseContorller extends Controller
{
    public function ShowExpense()
    {
        $expenseTitles = ExpenseTitle::all();
        return view('Expense.add_expense', compact('expenseTitles'));
    }

    public function AddExpense( Request $request )
    {
        \DB::transaction(function () use ( $request ) {

            $expense                   = new ExpenseDetail();
            $expense->date_time        = $request->expense_date_time;
            $expense->expense_amount   = $request->expense_amount;
            $expense->description      = $request->expense_description;
            $expense->expense_title_id = $request->expence_title_id;
            $expense->save();

            MultipleUploadController::InsertEntityExpenses($request, $expense->id, 'Hotel/Expenses', Auth::user()->id);
            Session::flash('success', 'Added Expense');
        });
        return back();
    }

    public function expenseUpdate( Request $request, $id )
    {
        \DB::transaction(function () use ( $request, $id ) {

            $expense                 = ExpenseDetail::find($id);
            $expense->date_time        = $request->expense_date_time;
            $expense->expense_amount   = $request->expense_amount;
            $expense->description      = $request->expense_description;
            $expense->expense_title_id = $request->expence_title_id;
            $expense->save();

            Session::flash('success', 'Added Expense');
        });

        return back();
    }

    public function ListAllExpenses()
    {
        $allExpenses = ExpenseDetail::AllExpenses();
        return view('Expense.all_expenses', compact('allExpenses'));
    }

    public function SearchEngine( Request $request )
    {
        $allExpenses = ExpenseDetail::SearchExpenses($request->search);
        return view('Expense.all_expenses', compact('allExpenses'));
    }

    public function EditExpense( $id )
    {
        $editExpense = ExpenseDetail::find($id);
        $expensetime = ExpenseDetail::getDateTimeAttribute($editExpense->date_time);
        return view('Expense.edit_expense', compact('editExpense', 'expensetime'));

    }

    public function DeleteExpense( $id )
    {
        $deleteExpense = ExpenseDetail::find($id);
        $deleteExpense->delete();
        return back();
    }
}
