<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $contact)
    {
        $this->name = $name;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Mail from Camlann')
            ->view('email.contactmail');
    }
}
