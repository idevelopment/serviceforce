<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

use App\Http\Requests;
use App\BaseServers;
use App\NetworkInformation;
use App\Server;
use App\serverHostingPack;
use App\ServerLocation;
use App\Sla;
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
      $apiUrl   = env('LEASEWEB_URL');
      $PayAsYouGoresource = '/payAsYouGo/bareMetals/instances';

      // Get all servers that need to execute provisioning
      $PayAsYouGo = Servers::where('status', 'New')
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

         // Get all data for the bareMetal and save it to the database.
         if($Provisioning){

           Servers::where('id', $order->id)
            ->where('status', 'New')
            ->update(['status' => 'Starting', 'bareMetalId' => $bareMetalId]);

           $modelResource = "/bareMetals/$bareMetalId";
           $checkData = curl_init();
           curl_setopt($checkData, CURLOPT_URL, $apiUrl . $modelResource);
           curl_setopt($checkData, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($checkData, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));

           $output = curl_exec($checkData);
           $json = json_decode($output, true);

           print_r($json);

             // network details.
             $network = new NetworkInformation;
             $network->dataPack = $json['bareMetal']['network']['dataPack'];
             $network->ipsAssigned = $json['bareMetal']['network']['ipsAssigned'];
             $network->ipsFreeOfCharge = '1';
             $network->save();

             // Location details.
             $location          = new ServerLocation;
             $location->Cabinet = $json['bareMetal']['location']['cabinet'];
             $location->Site    = $json['bareMetal']['location']['site'];
             $location->save();

             // server details
             $server                 = new Server;
             $server->hardDisks      = $json['bareMetal']['server']['hardDisks'];
             $server->hardwareRaid   = $json['bareMetal']['server']['hardwareRaid'];
             $server->kvm            = $json['bareMetal']['server']['kvm'];
             $server->numberOfCores  = $json['bareMetal']['server']['numberOfCores'];
             $server->numberOfCpus   = $json['bareMetal']['server']['numberOfCpus'];
             $server->processorSpeed = $json['bareMetal']['server']['processorSpeed'];
             $server->processorType  = $json['bareMetal']['server']['processorType'];
             $server->ram            = $json['bareMetal']['server']['ram'];
             $server->serverType     = $json['bareMetal']['server']['serverType'];
             $server->save();

             // server hosting pack details.
             $hostingPack               = new serverHostingPack;
             $hostingPack->bareMetalId  = $bareMetalId;
             $hostingPack->contractTerm = $json['bareMetal']['serverHostingPack']['contractTerm'];
             $hostingPack->serverName   = $json['bareMetal']['serverHostingPack']['serverName'];
             $hostingPack->serverType   = "Pay As you Go";
             $hostingPack->startDate    = $json['bareMetal']['serverHostingPack']['startDate'];
             $hostingPack->save();

             // sla details.
             $sla = new Sla;
             $sla->slaName = $json['bareMetal']['serviceLevelAgreement']['sla'];
             $sla->save();

             // Base server details.
             $baseServer              = new BaseServers;
             $baseServer->bareMetalId = $bareMetalId;
             $baseServer->serverName  = $json['bareMetal']['serverHostingPack']['serverName'];
             $baseServer->serverType  = $json['bareMetal']['serverHostingPack']['serverType'];
             $baseServer->serverStatus = 'Provisioning';
             $baseServer->serverState  = 'Starting';

             // Base server relations
             $baseServer->serverLocation()->associate($location);
             $baseServer->serverInfo()->associate($server);
             $baseServer->hostingPack()->associate($hostingPack);
             $baseServer->sla()->associate($sla);
             $baseServer->networkInfo()->associate($network);
             $baseServer->save();

             $this->info("General information for $bareMetalId saved");
           }


             // Install the operating system on the server.
           $URLinstall = "/bareMetals/$bareMetalId/install";
           Servers::where('bareMetalId', $bareMetalId)
            ->where('status', 'Starting')
            ->update(['status' => 'Provisioning']);

           $install = curl_init();
           curl_setopt($install, CURLOPT_URL, $apiUrl . $URLinstall);
           curl_setopt($install, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($install, CURLOPT_POSTFIELDS, $installData);
           curl_setopt($install, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
           curl_setopt($install, CURLOPT_POST, true );
           curl_setopt($install, CURLOPT_POSTFIELDS, $installData);
          $executeInstall = curl_exec($install);

          BaseServers::where('bareMetalId', $bareMetalId)
           ->where('serverStatus', 'Provisioning')
           ->update(['serverState' => 'Running']);
       }
    }
}
