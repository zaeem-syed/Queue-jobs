<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrderPlacedjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;



    //public $timeout=01;// if didn't succedd after one seocnd it will fail the job

    public $tries=-1;// for number of tries

    public $backoff=2;// to delay worker to retry it

    


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
      throw new \Exception("failed");
        sleep(3);
        info("hello!");
    }

      public function retryuntil()
    {
        return now()->addMinute();
    }
}
