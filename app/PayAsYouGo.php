<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PayAsYouGo
 * @package App
 */
class PayAsYouGo extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Mass-assign view.
     *
     * @var array
     */
    protected $fillable = [
        'bareMetalId', 'pool', 'customerNumber', 'model', 'modelLabel', 'osId', 'osLabel', 'pricePerGb', 'pricePerHour', 'startedAt', 'destroyedAt'
    ];
}
