<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statments extends Model
{

    protected $table = 'statmentss';

    protected $fillable = [

        'stament_name'
    ];


    public function counts()
    {
        return $this->belongsTo('App\Models\Acounte','statement_id','id');
    }
}
