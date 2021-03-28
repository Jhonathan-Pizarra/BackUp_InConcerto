<?php

namespace App\Mail;

use App\Festival;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewFestival extends Mailable
{
    use Queueable, SerializesModels;

    public $festival;
    /**
     * Create a new message instance.
     *
     * @param Festival $festival
     */
    public function __construct(Festival $festival)
    {
        $this->festival = $festival;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.festivals.new');
        return $this->markdown('emails.festivals.new');
    }
}
