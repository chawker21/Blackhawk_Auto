<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class weeklytotal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $weeklytotal;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(weeklytotal $weeklytotal)
    {
        $this->weeklytotal = invoice::where('created_at', '>=', Carbon::now()->subDays(7))->sum('invoice_total');//
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $message = new Twiml;
        $message->message("This is the total for the week");

        $Body = $this->weeklytotal;


        $SMS = new SMS(
            [

                'Body' => $Body
            ]
        );

        $SMS->save();
        print $message;





    } //
    }
}
