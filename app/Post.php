<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model 
{
    //
    //use SoftDeletes;

    protected $table = 'articulos';

    protected $fillable = ['titulo', 'descripcion','precio_base', 'foto', 'foto_id', 'user_id', 'visto'];

    public function user()
	{
		return $this->belongsTo('App\User');
    }
/*    
    public function comentarios()
	{
		return $this->hasMany('App\Comentario');
    }
*/
}    