<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class SuiteCrmInsert
 * @package App\Jobs
 */
class SuiteCrmInsert extends Job implements ShouldQueue
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
     *
     * @param array $input the form input
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
        
    }
}
