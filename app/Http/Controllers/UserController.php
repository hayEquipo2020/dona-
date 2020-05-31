<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function perfil($id)
    {
        $user = User::where('id', $id)->first();
        return view('usuarios/perfil',['user' => $user]);
    }   
    public function editar($id)
    {
        $user = User::where('id', $id)->first();
        return view('usuarios/editar',['user' => $user]);
    } 

    public function update($id)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->pais = $request->pais;
        $user->save();
        Session::flash('message', 'Genial !!');
        return Redirect::to('../articulo/'.$request->id);
        return view('usuarios/editar',['user' => $user]);
    } 
}
