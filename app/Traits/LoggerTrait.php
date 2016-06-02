<?php

namespace App\Traits;

use App\Logs;

/**
 * Class LoggerTrait
 *
 * This trait will be used to log all the handlings from the employees to the customers.
 * Also the crap that happends on the application and customers servers.
 * And logs it to a database table.
 *
 * @package App\Traits
 */
trait LoggerTrait
{
    /**
     * STATIC VARS
     *
     * Used to indicate the logging levels.
     */
    static $emergency = 1; // Indicates emergency logs.
    static $alert     = 2; // Indicates alert logs.
    static $critical  = 3; // Indicates critical logs.
    static $error     = 4; // Indicates error logs.
    static $warning   = 5; // Indicates warning logs.
    static $notice    = 6; // Indicates notica logs.
    static $info      = 7; // Indicates info logs.
    static $debug     = 8; // Indicates debug logs

    /**
     * Used to instance the log model. 
     * 
     * @var $protected
     */
    protected $logs;

    /**
     * LoggerTrait constructor.
     *
     * @param Logs $log
     */
    public function __construct(Logs $log)
    {
        $this->logs = $log;
    }
    
    /**
     * System is unusable.
     *
     * @param string  $message  The log message.
     * @param int     $id       The customer id.
     */
    public function emergency($message, $id)
    {
        $data['Employee_id'] = auth()->user()->id;
        $data['Customer_id'] = $id;
        $data['Message']     = $message;
        $data['Level']       = self::$emergency;

        $this->logs->create($data);
    }

    /**
     * Action must be taken immediately
     *
     * Example: server down, server has hardware issues. Etc
     *
     * @param  string $message  The log message.
     * @param  int    $id       The customer id.
     * @return null
     */
    public function alert($message,$id)
    {
        $data['Employee_id'] = auth()->user()->id;
        $data['Customer_id'] = $id;
        $data['Message']     = $message;
        $data['Level']       = self::$alert;

        $this->logs->create($data);
    }

    /**
     * Critical conditions.
     *
     * Example: Application comonent unaviable, unexpected exception.
     *
     * @param  string $message  The log message.
     * @param  int    $id       The costumer id.
     * @return null
     */
    public function critical($message, $id)
    {
        $data['Employee_id'] = auth()->user()->id;
        $data['Customer_id'] = $id;
        $data['Message']     = $message;
        $data['Level']       = self::$critical;

        $this->logs->create($data);
    }

    /**
     * Runtime errors that do not require immediate action but should
     * typically be logged and or monitored.
     *
     * @param  string $message  The log message.
     * @param  int    $id       The costumer id.
     * @return null
     */
    public function error($message, $id)
    {
        $data['Employee_id'] = auth()->user()->id;
        $data['Customer_id'] = $id;
        $data['Message']     = $message;
        $data['Level']       = self::$error;

        $this->logs->create($data);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated API's, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param  string $message  The log message.
     * @param  int    $id       The customer id.
     * @return null
     */
    public function warning($message, $id)
    {
        $data['Employee_id'] = auth()->user()->id;
        $data['Customer_id'] = $id;
        $data['Message']     = $message;
        $data['Level']       = self::$warning;

        $this->logs->create($data);
    }

    /**
     * Normal but significant events.
     *
     * @param  string $message  The log message.
     * @param  int    $id       The customer id.
     * @return null
     */
    public function notice($message, $id)
    {
        $data['Employee_id'] = auth()->user()->id;
        $data['Customer_id'] = $id;
        $data['Message']     = $message;
        $data['Level']       = self::$notice;

        $this->logs->create($data);
    }

    /**
     * Interesting events
     *
     * Example: User logs in, SQL Logs, etc...
     *
     * @param  string $message  The log message.
     * @param  int    $id       The customer id.
     * @return null
     */
    public function info($message, $id)
    {
        $data['Employee_id'] = auth()->user()->id;
        $data['Customer_id'] = $id;
        $data['Message']     = $message;
        $data['Level']       = self::$info;

        $this->logs->create($data);
    }

    /**
     * Detailed debug message.
     *
     * @param  string $message The log message.
     * @param  int    $id      The customer id.
     * @return null
     */
    public function debug($message, $id)
    {
        $data['Employee_id'] = auth()->user()->id;
        $data['Customer_id'] = $id;
        $data['Message']     = $message;
        $data['Level']       = self::$debug;

        $this->logs->create($data);
    }
}