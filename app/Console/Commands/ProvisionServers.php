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

class ProvisionServers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'provision:servers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the provisioning for Pay-As-You-Go servers';

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
      $apiKey   = config('ServiceForge.leaseweb.apikey');
      $apiUrl   = 'https://api.leaseweb.com/v1';
      $PayAsYouGoresource = '/payAsYouGo/bareMetals/instances';

      // Get all servers that need to execute provisioning
      $PayAsYouGo = Servers::where('status', 'new')
               ->orderBy('id', 'asc')
               ->take(1)
               ->get();

       foreach($PayAsYouGo as $order){
        $data = array("model" => $order->model);
        $installData = array("osId" => $order->osId);


         // Start the new pay-as-you-go server;
         $setup = curl_init();
         curl_setopt($setup, CURLOPT_URL, $apiUrl . $PayAsYouGoresource);
         curl_setopt($setup, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($setup, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
         curl_setopt($setup, CURLOPT_POST, true);
         curl_setopt($setup, CURLOPT_POSTFIELDS, $data);
         $StartSetup = curl_exec($setup);
         // Return the json response for the server provisioning.
         $Provisioning = json_decode($StartSetup, true);
         $bareMetalId = $Provisioning["bareMetalId"];

         // Install the operating system on the server.
         if($Provisioning){

           $URLinstall = "/bareMetals/$bareMetalId/install";
           Servers::where('id', $order->id)
            ->where('status', 'new')
            ->update(['status' => 'progress', 'bareMetalId' => $bareMetalId]);

           $install = curl_init();
           curl_setopt($install, CURLOPT_URL, $apiUrl . $URLinstall);
           curl_setopt($install, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($install, CURLOPT_POSTFIELDS, $installData);
           curl_setopt($install, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
           curl_setopt($install, CURLOPT_POST, true );
           curl_setopt($install, CURLOPT_POSTFIELDS, $installData);
          $executeInstall = curl_exec($install);
         }

         if($executeInstall){
         Servers::where(['id', $order->id, 'bareMetalId' => $bareMetalId])
          ->where('status', 'progress')
          ->update(['status' => 'completed']);
          $this->info('Pay as you go provisioning executed');
        }
       }
    }
}
