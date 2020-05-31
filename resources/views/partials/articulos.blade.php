@foreach($articulos as $articulo)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
              <img src="../../images/articulos/{{ $articulo->foto }}" class="img-thumbnail">
                <div class="card-body">
                  <p class="card-text">{{ $articulo->titulo }}</p>
                  <p class="card-text">{{ $articulo->detalle }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="/articulo/{{ $articulo->id }}" type="button" class="btn btn-sm btn-secondary">Detalle</a>
                        <a type="button" class="btn btn-sm btn-secondary">Agregar a Favoritos</a>   
                        <a href="/articulo/{{ $articulo->id }}" type="button" class="btn btn-sm btn-danger">Ofertar</a>
                        @auth
                        @if(Auth::user()->id == $articulo->user_id)
                            <a href="/articulo/editar/{{ $articulo->id }}" type="button" class="btn btn-sm btn-warning">Editar</a>
                        @endif
                        @endauth
                    </div>
                    <!--
                    <small class="text-muted">9 mins</small>
                    -->
                  </div>
                </div>
                <div class="card-footer">
                  <strong class="d-inline-block mb-2 text-primary">Ultima Oferta:
                    @isset($articulo->subasta->valor)
                    {{ $articulo->subasta->valor }} 
                    @else
                     SIN OFERTAS 
                     @endisset
                  </strong>
                </div>
                <div class="card-footer">
                  <strong class="d-inline-block mb-2 text-primary">Precio base:
                    @isset($articulo->precio_base)
                    {{ $articulo->precio_base }} 
                    @else
                     SIN BASE 
                     @endisset
                  </strong>
                </div>
              </div>
            </div>
            @endforeach