<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstanceServers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'bareMetalId', 'model_id', 'LWS_customer_number', 
    	'pricePerGb', 'pricePerHour', 'startedAt', 'destroyedAt'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['updated_at', 'created_at'];
}
