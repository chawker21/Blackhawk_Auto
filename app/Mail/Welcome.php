<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\invoice as invoice;
use Carbon\Carbon;
class Welcome extends Mailable
{
    use Queueable, SerializesModels;

	

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
		   

		
		
		return $this->from('madeye92@hotmail.com')->view('emails.welcome');
    }
}
