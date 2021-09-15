<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfertasMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Postulaciones por aprobar";
    public $oferta;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($oferta)
    {
        $this->oferta = $oferta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ofertas');
    }
}
