<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServerLocation
 * @package App
 */
class ServerLocation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Site', 'Cabinet', 'Rackspace', 'CombinationLock'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
