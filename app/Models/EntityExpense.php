<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityExpense extends Model
{
    use HasFactory;

    public function entityExpenses()
    {
        return $this->morphTo();
    }
}
