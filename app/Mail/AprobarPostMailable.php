<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AprobarPostMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Postulación Aprobada";

    public $postulation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postulation)
    {
        $this->postulation = $postulation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.aprobadopost');
    }
}
