<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

use App\Http\Requests;
use App\BaseServers;
use App\AssetStates;

use App\PayAsYouGo as Servers;
use App\Customers;
use App\User;
use Mail;

class CheckServerInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve the status of a requested server installation';

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
        $apiKey = config('ServiceForge.leaseweb.apikey');
        $apiUrl = 'https://api.leaseweb.com/v1';

        // Get all servers that need to execute provisioning
        $PayAsYouGo = Servers::where('status', 'progress')
            ->orderBy('id', 'asc')
            ->get();

        foreach ($PayAsYouGo as $order) {

            $serverId = $order->bareMetalId;

            $installResource = "/bareMetals/$serverId/installationStatus";

            $checkInstall = curl_init();
            curl_setopt($checkInstall, CURLOPT_URL, $apiUrl . $installResource);
            curl_setopt($checkInstall, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($checkInstall, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
            $verify = curl_exec($checkInstall);
            $data = json_decode($verify, true);

            if ($data["installationStatus"]["code"] = "1000") {
                Servers::where('id', $order->id)
                    ->where('status', 'progress')
                    ->update(['status' => 'completed', 'bareMetalId' => $order->bareMetalId]);
            } else {
                Mail::send('emails.serverInstall', $data, function ($message) {
                    $message->from('provisioning@idevelopment.be', 'iDevelopment Provisioning');
                    $message->subject("Checking installation process - $order->bareMetalId ");
                    $message->to('support@idevelopment.be');
                });
            }
        }
    }
}
