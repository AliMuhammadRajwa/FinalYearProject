<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseDetail extends Model
{
    use HasFactory;

    public function expense_title()
    {
        return $this->belongsTo(ExpenseTitle::class);
    }
    public static function getDateTimeAttribute( $value )
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function entity_relation()
    {
        return $this->morphMany('App\EntityExpense', 'entityExpenses');
    }

    public function scopeAllExpenses( $query )
    {
        $allExpenses = ExpenseDetail::join('expense_titles', 'expense_titles.id', '=', 'expense_details.expense_title_id')
                                    ->join('entity_expenses', 'expense_details.id', '=', 'entity_expenses.relation_id')
                                    ->join('users', 'users.id', '=', 'entity_expenses.user_id')
                                    ->where('entity_expenses.relation_type', '=', 'Hotel/Expenses')
                                    ->where('users.id', '=', Auth::user()->id)
                                    ->get([ 'expense_details.id', 'expense_details.date_time', 'expense_titles.expense_title', 'expense_details.expense_amount',
                                            'expense_details.description' ]);

        return $allExpenses;
    }

    public function scopeSearchExpenses( $query, $search )
    {
        $allClients = ExpenseDetail::join('expense_titles', 'expense_titles.id', '=', 'expense_details.expense_title_id')
                                   ->join('entity_expenses', 'expense_details.id', '=', 'entity_expenses.relation_id')
                                   ->join('users', 'users.id', '=', 'entity_expenses.user_id')
                                   ->where('entity_expenses.relation_type', '=', 'Hotel/Expenses')
                                   ->where('users.id', '=', Auth::user()->id)
                                   ->where(function ( $models ) use ( $search ) {
                                       $models->where('expense_details.date_time', 'like', '%' . $search . '%')
                                              ->orwhere('expense_details.id', 'like', '%' . $search . '%')
                                              ->orwhere('expense_titles.expense_title', 'like', '%' . $search . '%');
                                   })
                                   ->select('expense_details.id', 'expense_details.date_time', 'expense_titles.expense_title', 'expense_details.expense_amount',
                                       'expense_details.description')->get();

        return $allClients;
    }
}
