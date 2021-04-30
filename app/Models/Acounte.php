<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acounte extends Model
{
    protected $table = 'acountes';

    protected $fillable = [
        'expenses','income','covenant',
        'treasury_balance','statement_id','total_covenant',
        'active',
        'created_at', 'updated_at'
    ];


    public function statment()
    {
        return $this->hasMany('App\Models\Statments', 'statement_id', 'id');
    }
}
