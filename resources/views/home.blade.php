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
                  <nav class="level is-mobile">
                    <div class="level-item has-text-centered">
                      <div>
                        <p class="heading">Donado hasta ahora</p>
                      <p class="title">USD {{ $donado }}</p>
                      </div>
                    </div>
                  </nav>
                  <br>
            </div>
           @include('partials/articulos') 
            
        </div>
      </div>
</div>

@endsection
