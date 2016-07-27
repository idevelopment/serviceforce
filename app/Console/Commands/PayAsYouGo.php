<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PayAsYouGo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forge:payAsYouGo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all you pay as you servers.';

    /**
     * Create a new command instance.
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
        $path     = config('ServiceForge.leaseweb.urls.payasyougo');
        $client   = new \GuzzleHttp\Client();
        $response = $client->get($path, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $body = $response->getbody();
        $body->getContents();
        $data = json_decode($body, true);

        foreach($data as $server) {
            foreach($server as $output) {
                \App\PayAsYouGo::create([
                    'bareMetalId'    => $output['bareMetalId'],
                    'customerNumber' => $output['customerNumber'],
                    'model'          => $output['model'],
                    'pricePerGb'     => $output['pricePerGb'],
                    'pricePerHour'   => $output['pricePerHour'],
                    'startedAt'      => $output['startedAt'],
                    'destroyedAt'    => $output['destroyedAt'],
                ]);
            }
        }

        $this->info('Pay as You Go Servers added');
    }
}
