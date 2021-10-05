<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Asignación de Tutor";

    public $archivo,$user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($archivo,$user)
    {
        $this->archivo = $archivo;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.envio')->attach($this->archivo->getRealPath(),[
            'as' => $this->archivo->getClientOriginalName()
        ]);
    }
}
