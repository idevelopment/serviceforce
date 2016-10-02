<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\BaseServers;

class ServersList extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * The number of seconds before each reload.
     *
     * @var int|float
     */
     
    public $reloadTimeout = 10;
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data["servers"] = BaseServers::all();
        return view("servers/widgets/list", [
            'config' => $this->config,
        ], $data);
    }
}
