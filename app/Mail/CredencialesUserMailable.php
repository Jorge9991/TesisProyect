<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredencialesUserMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Credenciales de Usuario";

    public $credenciales;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($credenciales)
    {
        $this->credenciales = $credenciales;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.credencialesuser');
    }
}
