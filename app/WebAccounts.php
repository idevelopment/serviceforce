<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebAccounts extends Model
{

	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subscription_id', 'name', 'customer', 'subscription_status', 'startDate',
        'endDate', 'contractTerm'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

}
