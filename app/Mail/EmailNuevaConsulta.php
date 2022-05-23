<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNuevaConsulta extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nueva Consulta desde Sitio WEB')
                    ->markdown('emails.tienda.consulta');
    }
}
