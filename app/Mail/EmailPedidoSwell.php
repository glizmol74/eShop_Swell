<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailPedidoSwell extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $msg;

    
    public function __construct($data)
    {
        $this->data = $data;
        $this->msg = $data['msg'][0][0];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pedido')
                    ->markdown('emails.pedidos.pedidoswell');
    }
}
