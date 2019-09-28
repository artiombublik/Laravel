<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Field extends Model
{
	public $timestamps = false;
    protected $fillable = ['label','identifier', 'type'];

        public function users()
    {
        return $this->belongsToMany('App\User');
    }
    
}
