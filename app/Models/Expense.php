<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $dates = ['dateofexpense'];

    protected $fillable = ['expensegroup_id',  'head', 'rate', 'quantity', 'amount','dateofexpense'];

    public function group()
    {
        return $this->belongsTo(ExpanseGroup::class, 'expensegroup_id');
    }

}
