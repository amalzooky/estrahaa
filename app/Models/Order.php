<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'sales_channel',
        'name_clinte','num_phone','adress_clinte',
        'status_order', 'components_order','gifts',
        'num_products','total_price_products','discount',
        'shipping_price','total_value_order', 'shipping_company',
        'net_shipping','cost_order','order_won',
        'nots','customer_evaluation',
        'created_at', 'updated_at'
    ];

    public function orderclient()
    {
        return $this->hasMany('App\Models\OrderscClient', 'order_id', 'id');
    }
 public function ordergift()
    {
        return $this->hasMany('App\Models\OrdersGift', 'order_id', 'id');
    }


    public function stors()
    {
        return $this->belongsToMany('App\Models\Store','orders_client','order_id','stor_id');
    }
    public function storss()
    {
        return $this->belongsToMany('App\Models\Store','orders_gift','order_id','stor_id');
    }
}
