<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DataPackExcess
 * @package App
 */
class DataPackExcess extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'value', 'unit'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
