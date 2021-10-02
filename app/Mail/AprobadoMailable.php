<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AprobadoMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Aprobado por gestor";

    public $request,$informefinal;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$informefinal)
    {
        $this->request = $request;
        $this->informefinal = $informefinal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.aprobado');
    }
}
