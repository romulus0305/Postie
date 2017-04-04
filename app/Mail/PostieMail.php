<?php
// https://scotch.io/tutorials/easy-and-fast-emails-with-laravel-5-3-mailables
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostieMail extends Mailable
{
    use Queueable, SerializesModels;


    public $total = 30;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'goxyzvrk011@gmail.com';
        $name = 'Ignore Me';
        $subject = 'Krytonite Found';


        return $this->view('mail')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject);

    }
}
