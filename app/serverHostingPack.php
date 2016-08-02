<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class serverHostingPack
 * @package App
 */
class serverHostingPack extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'bareMetalId', 'serverName', 'serverType', 'startDate',
        'endDate', 'contractTerm'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
