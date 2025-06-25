<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['name', 'amount', 'category', 'spent_at'];

    protected $casts = [
        'spent_at' => 'date',
    ];
}