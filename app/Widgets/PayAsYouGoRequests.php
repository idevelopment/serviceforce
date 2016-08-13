<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;

use App\PayAsYouGo as PayAsYouGo;

class PayAsYouGoRequests extends AbstractWidget
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
      $data["PayAsYouGo"] = PayAsYouGo::all();
      $data["PayAsYouGoQ"] = PayAsYouGo::whereDate('updated_at', '=', Carbon::today()->toDateString())->get();

      return view("servers/widgets/queue", [
          'config' => $this->config,
      ], $data);
    }
}
