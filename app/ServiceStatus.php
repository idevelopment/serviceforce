<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceStatus
 * @package App
 */
class ServiceStatus extends Model
{
    /**
     * Mass-assign attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'bgcolor', 'background'];

    /**
     * Hiiden fields for the view.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
