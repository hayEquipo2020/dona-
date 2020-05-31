<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subasta extends Model 
{
    //
    //use SoftDeletes;

    protected $table = 'subastas';

    protected $fillable = ['user_id', 'articulo_id','valor', 'estado'];

    public function user()
	{
		return $this->belongsTo('App\User');
    }
    public function articulo()
	{
		return $this->belongsTo('App\Articulo');
    }
}    