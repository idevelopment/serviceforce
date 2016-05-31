<?php

namespace App\Console\Commands;

use App\BaseServers;
use App\NetworkInformation;
use App\Server;
use App\serverHostingPack;
use App\ServerLocation;
use App\Sla;
use Illuminate\Console\Command;

class ForgeServers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forge:servers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all the info about the servers.';

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
        // GET the data from the api.
        $path     = 'https://api.leaseweb.com/v1/bareMetals/';
        $client   = new \GuzzleHttp\Client();
        $response = $client->get($path, ['headers' => ['X-Lsw-Auth' => '']]);

        $body = $response->getbody();
        $body->getContents();
        $data = json_decode($body, true);

        // start the inserts.
        foreach($data as $info) {
            // Location details.
            $location          = new ServerLocation;
            $location->Cabinet = $info['location']['cabinet'];
            $location->Site    = $info['location']['site'];
            $location->save();

            // network details.
            $network = new NetworkInformation;
            $network->dataPack = $info['network']['dataPack'];
            $network->ipsAssigned = $info['network']['ipsAssigned'];
            $network->ipsFreeOfCharge = $info['network']['ipsFreeOfCharge'];
            $network->save();

            // server details
            $server                 = new Server;
            $server->hardDisks      = $info['server']['hardDisks'];
            $server->hardwareRaid   = $info['server']['hardwareRaid'];
            $server->kvm            = $info['server']['kvm'];
            $server->numberOfCores  = $info['server']['numberOfCores'];
            $server->numberOfCpus   = $info['server']['numberOfCpus'];
            $server->processorSpeed = $info['server']['processorSpeed'];
            $server->processorType  = $info['server']['processorType'];
            $server->ram            = $info['server']['ram'];
            $server->serverType     = $info['server']['serverType'];
            $server->save();

            // server hosting pack details.
            $hostingPack               = new serverHostingPack;
            $hostingPack->bareMetalId  = $info['serverHostingPack']['bareMetalId'];
            $hostingPack->contractTerm = $info['serverHostingPack']['contractTerm'];
            $hostingPack->serverName   = $info['serverHostingPack']['serverName'];
            $hostingPack->serverType   = $info['serverHostingPack']['serverType'];
            $hostingPack->startDate    = $info['serverHostingPack']['startDate'];
            $hostingPack->save();

            // sla details.
            $sla = new Sla;
            $sla->slaName = $info['serviceLevelAgreement']['sla'];
            $sla->save();

            // Base server details.
            $baseServer              = new BaseServers;
            $baseServer->bareMetalId = $info['bareMetalId'];
            $baseServer->serverName  = $info['serverName'];
            $baseServer->serverType  = $info['serverType'];

            // Base server relations
            $baseServer->serverLocation()->associate($location);
            $baseServer->serverInfo()->associate($server);
            $baseServer->hostingPack()->associate($hostingPack);
            $baseServer->sla()->associate($sla);
            $baseServer->networkInfo()->associate($network);
            $baseServer->save();
        }
    }
}
