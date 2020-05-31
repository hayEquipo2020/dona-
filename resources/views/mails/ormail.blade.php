{{ $demo->receiver }},
A continuacion detallamos datos del gasto generado
Adjuntamos imagen del gasto
 

Detalle:
Fecha: {{ date("d-m-Y", strtotime($demo->fechagenerado)) }}
Carpeta: {{ $demo->carpetacliente }}
Concepto: {{ $demo->txtmovimiento }}
Observaciones: {{ $demo->observaciones }}
Importe: {{ $demo->moneda }} {{ number_format($demo->importe,2 ,',','.') }}

 
Gracias,
{{ $demo->sender }}