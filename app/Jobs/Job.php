<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;

/**
 * Class Job
 * @package App\Jobs
 */
abstract class Job
{
    use Queueable;
    
}
