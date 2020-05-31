@extends('layouts.app')

@section('content')

<div class="container">
  @if (Session::has('message'))
  <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Perfecto</h4>
        {{ Session::get('message') }}
  </div>
  @endif
  @if (Session::has('error'))
  <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Ups !!!!!</h4>
        {{ Session::get('error') }}
  </div>
  @endif
<div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          @isset($articulo->precio_base)
            <strong class="d-inline-block mb-2 text-primary">Precio Base: {{ $articulo->precio_base }}</strong>
          @else
            <strong class="d-inline-block mb-2 text-primary">Sin precio Base</strong>
          @endisset
          <h3 class="mb-0">{{ $articulo->titulo }}</h3>
          <div class="mb-1 text-muted">{{ $articulo->created_at }}</div>
          <p class="card-text mb-auto">{{ $articulo->detalle }}</p>
          @isset($articulo->subasta->valor)
            <strong class="d-inline-block mb-2 text-primary">Ultima Oferta: {{ $subasta->valor }} </strong>
            <strong class="d-inline-block mb-2 text-primary">Realizada por: {{ $subasta->user->name }} </strong>
          @else
           <strong class="d-inline-block mb-2 text-primary">Sin Ofertas</strong>
          @endisset
        <form action="/articulo/ofertar" method="POST">
          @csrf
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">$UYU</span>
            </div>
            <input type="hidden" id="id" name="id" value="{{ $articulo->id }}">
            <input type="text"  id="valor" name="valor" class="form-control" aria-label="Amount (to the nearest dollar)">
          </div>
          <button href="" class="stretched-link btn btn-primary btn-sm">Ofertar</button>
        </form>
        </div>
        <div class="col-md-6">
          <img src="../../images/articulos/{{ $articulo->foto }}" class="img-thumbnail">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          Algun texto o algo para poner
        </div>

      </div>
    </div>
  </div>
</div>

@endsection