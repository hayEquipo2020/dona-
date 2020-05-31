<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubastaMail extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $articulo, $titulo, $valor, $total)
    {
        $this->nombre = $nombre;
        $this->articulo = $articulo;
        $this->titulo = $titulo;
        $this->valor = $valor;
        $this->total = $total;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('mails.demo',['nombre' => $this->nombre, 
                                        'articulo' => $this->articulo, 
                                        'titulo' => $this->titulo,
                                        'valor' => $this->valor,
                                        'total' => $this->total,
                                        ])
                    ->subject('Felicidades !!! Ganaste la Subasta de Dona+')
                    ->from('no-responder@webdevelop.uy', 'Dona+');
        return $email;
    }
}
