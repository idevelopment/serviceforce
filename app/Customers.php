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
        'country', 'phone', 'mobile', 'email', 'vat', 'status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Customert status 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\CustomerStatusses', 'status_id', 'id');
    }
}
