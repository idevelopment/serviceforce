<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

use App\BaseServers;
use App\NetworkInformation;
use App\Server;
use App\serverHostingPack;
use App\ServerLocation;
use App\Sla;

use App\PayAsYouGo as PSG;
use App\Customers;
use App\User;
use Mail;

class PayAsYouGoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'configure:psyg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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


      // Get all servers that need to execute provisioning
            $PayAsYouGo = PYSG::where('status', 'completed')
                     ->orderBy('id', 'asc')
                     ->get();

             foreach($PayAsYouGo as $PayAsYouGoItem){

            $bareMetalId = $PayAsYouGoItem->bareMetalId;

      // GET the data from the api.
      $modelResource = "/bareMetals/$bareMetalId";
      $apiKey   = config('ServiceForge.leaseweb.apikey');
      $apiUrl   = env('LEASEWEB_URL');

      // start the inserts.
          $exist = BaseServers::where('bareMetalId','=', $PayAsYouGoItem['bareMetalId'])->count();
          if ($exist === 0) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl . $modelResource);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));

            $output = curl_exec($ch);
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
              $hostingPack->bareMetalId  = $json['bareMetal']['serverHostingPack']['bareMetalId'];
              $hostingPack->contractTerm = $json['bareMetal']['serverHostingPack']['contractTerm'];
              $hostingPack->serverName   = $json['bareMetal']['serverHostingPack']['serverName'];
              $hostingPack->serverType   = $json['bareMetal']['serverHostingPack']['serverType'];
              $hostingPack->startDate    = $json['bareMetal']['serverHostingPack']['startDate'];
              $hostingPack->save();

              // sla details.
              $sla = new Sla;
              $sla->slaName = $json['bareMetal']['serviceLevelAgreement']['sla'];
              $sla->save();

              // Base server details.
              $baseServer              = new BaseServers;
              $baseServer->bareMetalId = $json['bareMetal']['bareMetalId'];
              $baseServer->serverName  = $json['bareMetal']['serverHostingPack']['serverName'];
              $baseServer->serverType  = $json['bareMetal']['serverHostingPack']['serverType'];
              $baseServer->serverStatus = 'Provisioned';
              $baseServer->serverState  = 'Running';

              // Base server relations
              $baseServer->serverLocation()->associate($location);
              $baseServer->serverInfo()->associate($server);
              $baseServer->hostingPack()->associate($hostingPack);
              $baseServer->sla()->associate($sla);
              $baseServer->networkInfo()->associate($network);
              $baseServer->save();

              $this->info('Servers added');
          } else {
              $this->error("Server:$bareMetalId has already been saved to the database");
          }
      }
    }
}
