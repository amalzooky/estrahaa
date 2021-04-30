<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'send_name','receiv_name','no_order',
        'send_addres','receive_addres','payment_method',
        'date_arrive', 'paymen_total','send_phone',
        'receiv_phone',
        'created_at', 'updated_at'
    ];
}
