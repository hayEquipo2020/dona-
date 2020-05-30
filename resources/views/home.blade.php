@extends('layouts.app')

@section('content')
<div class="content">
    <div class="album py-5 bg-light">
        <div class="container">
          @if (Session::has('message'))
          <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Perfecto</h4>
                {{ Session::get('message') }}
          </div>
          @endif
          <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <div class="container">
                      <h1 class="display-3">Bienvenidos</h1>
                      <h3>Esta plataforma esta construida para poder donar o comprar a través de una forma de subasta aquello que no estamos usando, todo lo recaudado va a ser usado en acciones que tengan un impacto positivo en nuestro planeta y comunidad.
                        Más informacion en la seccion de about</h3>
                    </div>
                  </div>
            </div>
            
            @foreach($articulos as $articulo)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
              <img src="../../images/articulos/{{ $articulo->foto }}" class="img-thumbnail">
                <div class="card-body">
                  <p class="card-text">{{ $articulo->Titulo }}</p>
                  <p class="card-text">{{ $articulo->detalle }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
      </div>
</div>

@endsection
