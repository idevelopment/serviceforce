<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NetworkInformation
 * @package App
 */
class NetworkInformation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dataPack', 'ipsFreeOfCharge', 'ipsAssigned', 'excessIpsPrice',
        'DataPackExcess_id', 'macAddresses', 'pricePerMonth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
