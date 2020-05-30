<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Articulo;
use Auth;
use Redirect;
use Session;
use Uuid;
use Storage;

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
    public function publicar(Request $request)
    {

        $uuid = Uuid::generate()->string;
        if ($request->myFiles)
        {
            $name = $request->myFiles->getClientOriginalName();
            $ext=explode('.',$name)[1];
            $name = $uuid.'.'.$ext;
            $filename = \Storage::disk('docs')->put($name, \File::get($request->myFiles));
            $url = Storage::disk('docs')->url($name);
            $detalle=$request->detalle;
            $post = new Articulo;
            $post->foto = $name;
            $post->titulo = $request->titulo;
            $post->precio_base = $request->precio_base;
            $post->descripcion = $detalle;;
            $post->user_id = Auth::user()->id;
            $post->save();
        }
        else
        {
            $post = new Articulo;
            $post->titulo = $request->titulo;
            $post->foto = "";
            $post->descripcion = $detalle;
            $post->precio_base = $request->precio_base;
            $post->user_id = Auth::user()->id;
            $post->save();   
        }
        
        Session::flash('message', 'Publicacion realziada con exito');
        return Redirect::to('/');
        //return view('gastos/edit', ['gasto' => $gasto]);
    }
}
