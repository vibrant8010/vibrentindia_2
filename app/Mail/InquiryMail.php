<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiryData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inquiryData)
    {
        $this->inquiryData = $inquiryData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Inquiry Received')
                    ->view('emails.inquiry')
                    ->with('inquiryData', $this->inquiryData);
    }
}
