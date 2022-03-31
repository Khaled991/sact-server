<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $replacements;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($replacements)
    {
        $this->replacements = $replacements;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $replacements = $this->replacements;
        return $this->markdown('emails.contactUs', compact('replacements'));
    }
}
