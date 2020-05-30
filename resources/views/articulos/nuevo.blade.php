@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nueva Publicacion</div>

                <div class="card-body">
                    <form action="publicar-post" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="user_id" name="user_id">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Titulo</label>
                          <input type="text" required class="form-control" id="titulo" name="titulo" placeholder="Titulo de la publicacion">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Detalle</label>
                          <textarea class="form-control summernote" required id="detalle" name="detalle" rows="3">

                          </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Archivo para subir</label>
                            <input type="file" class="form-control-file" id="myFiles" name="myFiles">
                        </div>
                          <div class="box-footer">
                            <button type="submit" id="bt-publicar" class="btn btn-primary">Grabar/Subir</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection