<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'product_name', 'count_proud', 'description',
        'buy_price', 'selling_price', 'total_price',
        'active',
        'created_at', 'updated_at'
    ];

    public function scopeActive($query)
    {

        return $query->where('active', 1);
    }

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'orders_client', 'order_id', 'stor_id');

    }
    public function orderes()
    {
        return $this->belongsToMany('App\Models\Order', 'orders_gift', 'order_id', 'stor_id');

    }
}
