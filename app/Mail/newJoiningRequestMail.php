<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newJoiningRequestMail extends Mailable
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

        return $this->markdown('emails.newJoiningRequest', compact('replacements'));
    }
}
