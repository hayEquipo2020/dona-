@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Opciones</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Editar</li>
                        <li class="list-group-item">Cambiar Foto</li>
                      </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de Usuario</div>

                <div class="card-body">
                    <form>
                    <ul class="list-group">
                        <li class="list-group-item">Nombre: <strong> {{ Auth::user()->name }}</strong></li>
                        <li class="list-group-item">E-Mail: <strong> {{ Auth::user()->email }}</strong></li>
                        <li class="list-group-item">Direccion: <strong> {{ Auth::user()->direccion }}</strong></li>
                        <li class="list-group-item">Telefono: <strong>  {{ Auth::user()->telefono }}</strong></li>
                        <li class="list-group-item">Pais: <strong> {{ Auth::user()->pais }}</strong></li>
                      </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection