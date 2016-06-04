<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customers
 * @package App
 */
class Customers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company', 'fname', 'name', 'address', 'zipcode', 'city',
        'country', 'phone', 'email', 'vat', 'Status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
