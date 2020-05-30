<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Articulo;
use Auth;
use Redirect;
use Session;

class ArticuloController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articulos = Articulo::paginate(20);
        return view('articulos',['articulos' => $articulos]);
    }
    public function nuevo()
    {
        if(Auth::user())
        {
            return view('articulos/nuevo');
        }
        else{
            Session::flash('message', 'Debes ingresar al sistema');
            return Redirect::to('/');
        }
    }    
    public function detalle($id)
    {
        $articulo = Articulo::where('id', $id)->first();
        return view('articulo/'.$id,['articulo' => $articulo]);
    }    
}
