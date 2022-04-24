<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemainderPostmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    private $mail_content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_content)
    {
        //
        $this->mail_content = $email_content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reaminder_create_post')->with('email_content', $this->mail_content);
    }
}
