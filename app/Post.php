<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model 
{
    //
    //use SoftDeletes;

    protected $table = 'articulos';

    protected $fillable = ['titulo', 'descripcion','precio_base', 'foto', 'foto_id', 'user_id', 'visto','fecha'];

    public function user()
	{
		return $this->belongsTo('App\User');
    }
    public function subasta()
	{
		return $this->belongsTo('App\Subasta','id','articulo_id');
    }
}    