<?php

namespace App\Console\Commands;

use App\WebAccounts as Web;
use Illuminate\Console\Command;

 /**
 * Class WebhostingAccounts
 * @package App\Console\Commands
 */

class WebhostingAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forge:web';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save all the webaccounts to the database.';

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
        // TODO
        // GET the data from the plesk api.


        // Insert the data
        foreach($data as $info)
        {
            foreach($info as $web) {
                Web::create([
                    'name'  => $os['operatingSystem']['name'],
                    'subscription_id' => $os['operatingSystem']['id'],

                ]);
            }
        }

    }
}