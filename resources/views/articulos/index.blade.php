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
            @include('partials/articulos')
        </div>
      </div>
</div>

@endsection
