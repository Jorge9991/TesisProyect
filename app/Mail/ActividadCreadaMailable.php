<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActividadCreadaMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Nueva Actividad";

    public $actividad,$user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($actividad,$user)
    {
        $this->actividad = $actividad;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.activitycreate');
    }
}
