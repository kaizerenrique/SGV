<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistroUsuarioMailable extends Mailable
{
    use Queueable, SerializesModels;

    //variables
    private $mensajeCorreo;
    private $name;
    private $email;
    private $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensajeCorreo, $name, $email, $password)
    {        
        $this->mensajeCorreo = $mensajeCorreo;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->email, $this->name),
            subject: 'Registro Usuario Mailable',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.registrousuario',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'mensajeCorreo' => $this->mensajeCorreo
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
