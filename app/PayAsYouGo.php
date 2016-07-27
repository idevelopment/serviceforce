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
    public $timestamps = false;

    /**
     * Mass-assign view.
     *
     * @var array
     */
    protected $fillable = [
        'bareMetalId', 'customerNumber', 'model', 'pricePerGb', 'pricePerHour', 'startedAt', 'destroyedAt'
    ];
}
