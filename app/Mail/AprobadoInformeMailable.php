<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AprobadoInformeMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Aprobado Todos los formatos";

    public $correoegresado;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correoegresado)
    {
        $this->correoegresado = $correoegresado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.aprobadoinforme');
    }
}
