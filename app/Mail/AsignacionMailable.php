<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AsignacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Asignación como tutor";

    public $postulation,$docente,$postulaciones;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postulation,$docente,$postulaciones)
    {
        $this->postulation = $postulation;
        $this->docente = $docente;
        $this->postulaciones = $postulaciones;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.asignacion');
    }
}
