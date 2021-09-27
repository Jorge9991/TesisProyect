<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RechazarAsignacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Aceptación del Tutor";

    public $observacion,$docente,$asignation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($observacion,$docente,$asignation)
    {
        $this->docente = $docente;
        $this->observacion = $observacion;
        $this->asignation = $asignation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.rechazarasignacion');
    }
}
