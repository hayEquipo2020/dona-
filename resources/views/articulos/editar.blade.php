@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nueva Publicacion</div>

                <div class="card-body">
                    <form action="/articulos/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $articulo->id }}">
                        <input type="hidden" class="form-control" id="user_id" name="user_id">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Titulo</label>
                          <input type="text" required class="form-control" 
                          id="titulo" name="titulo" 
                          value="{{ $articulo->titulo }}"
                          placeholder="Titulo de la publicacion">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Detalle</label>
                            <textarea class="form-control summernote" required id="detalle" name="detalle" >
                            {{ $articulo->descripcion }}
                          </textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Precio Base</label>
                          @if($modificable)
                            <input type="text" required class="form-control" value="{{ $articulo->precio_base }}" id="precio_base" name="precio_base">
                            @else
                            <div class="alert alert-danger alert-dismissible">
                                No se permite el cabio de valor, ya existe una oferta realizada
                          </div>
                            <input type="text" disabled required class="form-control" value="{{ $articulo->precio_base }}" id="precio_base" name="precio_base">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Subir Foto</label>
                            <input type="file" class="form-control-file" id="myFiles" name="myFiles">
                        </div>
                          <div class="box-footer">
                            <button type="submit" id="bt-publicar" class="btn btn-primary">Publicar</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection