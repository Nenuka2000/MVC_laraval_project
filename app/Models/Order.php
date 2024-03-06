<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'first_name',
        'last_name',
        'phone',
        'company',
        'address_line_1',
        'address_line_2',
        'city',
        'zip'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function price()
    {
        return $this->items->sum(function ($item){
            return $item->price * $item->quantity;
        });
    }
}
