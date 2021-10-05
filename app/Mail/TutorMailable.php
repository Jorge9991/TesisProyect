<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Tutor Asignado";

    public $docente;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($docente)
    {
        $this->docente = $docente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.tutorasignado');
    }
}
