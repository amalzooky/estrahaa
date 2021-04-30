<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCompanies extends Model
{
    protected $table = 'shipping_companies';

    protected $fillable = [

        'shipp_name'
    ];

}
