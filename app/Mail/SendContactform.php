<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactform extends Mailable
{
    use Queueable, SerializesModels;
     
    public string $textsubject;
    public string $textmessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $message)
    {
        $this->textsubject = $subject;
        $this->textmessage = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Formulario de contacto -" .config("app.name"))
        ->markdown('emails.contact');
    }
}
