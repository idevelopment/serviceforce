<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CrmUpdate extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * The form input
     *
     * @var object
     */
    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct($input)
    {
        $this->data = $input;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
