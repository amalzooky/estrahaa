<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channels';

    protected $fillable = [

        'chann_name'   , 'active',
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

}
