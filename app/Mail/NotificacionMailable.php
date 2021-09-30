<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Revision de documentación";

    public $correoegresado,$informefinal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correoegresado,$informefinal)
    {
        $this->correoegresado = $correoegresado;
        $this->informefinal = $informefinal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notificacion');
    }
}
