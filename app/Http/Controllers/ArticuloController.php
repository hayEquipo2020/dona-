<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Articulo;
use App\Subasta;
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
        //$this->middleware('auth')->except(['index', 'detalle']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articulos = Articulo::with('subasta')->paginate();
        //dd($articulos);
        return view('articulos/index', ['articulos' => $articulos]);
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
    public function editar($id)
    {
        if(Auth::user())
        {
            $articulo = Articulo::where('id', $id)->where('user_id', Auth::user()->id)->first();
            $subasta = Subasta::where('articulo_id', $id)->first();
            if(!$subasta)
            {
                $modificable = true;
            }
            else
            {
                $modificable = false;
            }
            return view('articulos/editar' ,['articulo' => $articulo, 'modificable' => $modificable]);
        }
        else{
            Session::flash('message', 'Debes ingresar al sistema');
            return Redirect::to('/');
        }
    }   
    public function update(Request $request)
    {
        if(Auth::user())
        {
            $articulo = Articulo::where('id', $request->id)->where('user_id', Auth::user()->id)->first();
            $subasta = Subasta::where('articulo_id', $request->id)->first();
            if(!$subasta)
            {
                $modificable = true;
                $articulo->valor = $request->valor;
            }
            else
            {
                $modificable = false;
            }
            $articulo->titulo = $request->titulo;
            $articulo->descripcion = $request->detalle;
            $articulo->save();
            Session::flash('message', 'Modificacion realizada con exito');
            return Redirect::to('/');
        }
        else{
            Session::flash('message', 'Debes ingresar al sistema');
            return Redirect::to('/');
        }
    }
    public function detalle($id)
    {
        $articulo = Articulo::where('id', $id)->first();
        $subasta = Subasta::where('articulo_id', $id)->first();
        return view('articulos/detalle' ,['articulo' => $articulo, 'subasta' => $subasta]);
    } 
    
    public function ofertar(Request $request)
    {
        if(Auth::user())
        {
            $articulo = Articulo::where('id', $request->id)->first();
            $subasta = Subasta::where('articulo_id', $request->id)->first();
            if($subasta)
            {
                if($request->valor >= $articulo->precio_base)
                {
                    if($request->valor > $subasta->valor)
                    {
                        $subasta->user_id = Auth::user()->id;
                        $subasta->articulo_id = $request->id;
                        $subasta->valor = $request->valor;
                        $subasta->save();
                        Session::flash('message', 'Genial !!');
                        return Redirect::to('../articulo/'.$request->id);
                    }
                    else{
                        Session::flash('error', 'Debes ofertar mas de '.$subasta->valor);
                        return Redirect::to('../articulo/'.$request->id);
                    }
                }
                else
                {
                    Session::flash('error', 'Debes ofertar mas '.$subasta->valor);
                    return Redirect::to('../articulo/'.$request->id); 
                }
            }
            else{
                if($request->valor >= $articulo->precio_base)
                {
                    $subasta = new Subasta;
                    $subasta->user_id = Auth::user()->id;
                    $subasta->articulo_id = $request->id;
                    $subasta->valor = $request->valor;
                    $subasta->save();   
                    Session::flash('message', 'Genial !!!');
                    return Redirect::to('../articulo/'.$request->id);
                }
                else
                {
                    Session::flash('error', 'Debes ofertar mas de '.$articulo->precio_base);
                    return Redirect::to('../articulo/'.$request->id); 
                }
            }
        }
        else{
            Session::flash('message', 'Debes ingresar al sistema');
            return Redirect::to('/');   
        }
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
