<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abalancs extends Model
{
  protected $table = 'balance';

    protected $fillable = [

        'treasury_balance'
    ];

}
