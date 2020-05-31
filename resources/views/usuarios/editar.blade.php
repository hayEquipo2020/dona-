@extends('layouts.app')
@section('content')
<!-- Styles -->
<link href="https://bootswatch.com/4/materia/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Opciones</div>
                    <div class="card-body">
                        <ul class="list-group">
                        <li class="list-group-item">Cambiar Foto</li>
                        </ul>
                    </div>
                </div>
        </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Estos son tus datos a cambiar:</div>
            <div class="card-body">
                <form action="/usuarios/update" method="post">
                    @csrf
                    <fieldset>
                        <input type="hidden" value="{{ $user->id }}"  id="id" name="id">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo electronico</label>
                            <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ingresar correo">
                                <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tus datos con terceros.</small>
                            </div>


                            <div class="form-group">
                                <label for="changeName">Nombre y Apellido</label>
                                <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Ingresa tu nombre">
                                <small id="nameHelp" class="form-text text-muted">Ingresa aqui tu nombre y apellido.</small>
                            </div>


                            <div class="form-group">
                                <label for="changeName">Direccion</label>
                                <input type="text" value="{{ $user->direccion }}" class="form-control" id="direccion" name="direccion" aria-describedby="addressHelp" placeholder="Ingresa tu direccion">
                                <small id="addressHelp" class="form-text text-muted">Ingresa aqui tu direccion.</small>
                            </div>

                            <div class="form-group">
                                <label for="changeName">Telefono</label>
                                <input type="text" value="{{ $user->telefono }}" class="form-control" id="telefono" name="telefono" aria-describedby="telephoneHelp" placeholder="Ingresa tu telefono">
                                <small id="telephoneHelp" class="form-text text-muted">Ingresa aqui tu telefono.</small>
                            </div>

                            <button type="submit" class="btn btn-success">Enviar</button>
                            <button type="reset" class="btn btn-warning">Cancelar</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection