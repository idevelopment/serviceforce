<?php

namespace App\Console\Commands;

use App\OperatingSystems as OS;
use Illuminate\Console\Command;

/**
 * Class OperatingSystems
 * @package App\Console\Commands
 */
class OperatingSystems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forge:os';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save all the operatings systems to the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Connect to the api
        // GET the data from the api.
        $path     = config('ServiceForge.leaseweb.urls.os');
        $client   = new \GuzzleHttp\Client();
        $response = $client->get($path, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $body = $response->getbody();
        $body->getContents();
        $data = json_decode($body, true);

        // Insert the data
        foreach($data as $info)
        {
            foreach($info as $os) {
                OS::create([
                    'osId' => $os['operatingSystem']['id'],
                    'name'  => $os['operatingSystem']['name']
                ]);
            }
        }

    }
}
