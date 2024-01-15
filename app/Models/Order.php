<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_method',
        'delivery_time',
        'delivery_address',
        'no_contact_delivery',
        'selected_items',
        'full_name',
        'card_number',
        'expiration_date',
        'ccv',
        'tip_amount',
        'total_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
