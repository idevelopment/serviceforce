<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Logs
 * @package App
 */
class Logs extends Model
{
    use SoftDeletes;

    /**
     * Mass-assign views.
     *
     * @var array
     */
    protected $fillable = [
        'Employee_id', 'Customer_id', 'level', 'message'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Hidden fields for the view.
     * 
     * @var array
     */
    protected $hidden = ['updated_at'];
}
