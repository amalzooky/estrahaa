<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersGift extends Model
{
    protected $table = 'orders_gift';

    protected $fillable = [
        'order_id',
        'stor_id',
    ];
    public $timestamps = false;

    public function orders()
    {
        return $this->belongsTo('App\Models\Order', 'order_id','id');
    }

    public function stors()
    {
        return $this->belongsTo('App\Models\Store', 'stor_id');
    }
//    public $timestamps = false;
}

