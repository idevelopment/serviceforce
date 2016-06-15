<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sla
 * @package App
 */
class Sla extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slaName', 'pricePerMonth'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
