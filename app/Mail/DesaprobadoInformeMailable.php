<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DesaprobadoInformeMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Correción";

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
        return $this->view('emails.noaprobadoinforme');
    }
}
