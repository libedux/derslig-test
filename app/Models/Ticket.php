<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_category_id',
        'seat_id',
        'order_id',
    ];


    public function event(): HasOne
    {
        return $this->hasOne(Event::class);
    }
    public function ticketCategory(): HasOne
    {
        return $this->hasOne(TicketCategory::class);
    }
    public function seat(): HasOne
    {
        return $this->hasOne(Seat::class);
    }
    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

}
