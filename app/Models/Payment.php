<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'total_amount',
        'cc_number',
        'cc_exp_month',
        'cc_exp_year',
        'cc_cvv'
    ];


    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }
}
