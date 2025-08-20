<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

class PresupuestoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;
    public $archivo;

    /**
     * Create a new message instance.
     */
    public function __construct($datos)
    {
        $this->datos = $datos;
        $this->archivo = $datos['archivo'] ?? null;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo mensaje de presupuesto',
            from: new Address('no-reply@pramet.osole.com.ar', ($this->datos['nombre'] ?? '')),
        );
    }
    
    public function attachments(): array
    {
        $archivos = [];

        if (isset($this->datos['archivo']) && $this->datos['archivo'] instanceof \Illuminate\Http\UploadedFile) {
            $archivos[] = \Illuminate\Mail\Mailables\Attachment::fromPath(
                $this->datos['archivo']->getRealPath()
            )->as($this->datos['archivo']->getClientOriginalName())
            ->withMime($this->datos['archivo']->getMimeType());
        }

        return $archivos;
    }

}
