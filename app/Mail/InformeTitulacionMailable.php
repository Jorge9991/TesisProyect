<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformeTitulacionMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Informe al gestor de titulación";

    public $archivo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($archivo)
    {
        $this->archivo = $archivo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.titulacion')->attach($this->archivo->getRealPath(),[
            'as' => $this->archivo->getClientOriginalName()
        ]);
    }
}
