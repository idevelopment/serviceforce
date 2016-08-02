<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Server
 * @package App
 */
class Server extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ram', 'kvm', 'serverType', 'processorType', 'processorSpeed', 'numberOfCpus',
        'numberOfCores', 'hardDisks', 'hardwareRaid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
