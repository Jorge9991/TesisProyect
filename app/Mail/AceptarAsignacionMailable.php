<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AceptarAsignacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Aceptación del Tutor";

    public $docente,$asignacion;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($docente,$asignacion)
    {
        $this->docente = $docente;
        $this->asignacion = $asignacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.aceptarasignacion');
    }
}
