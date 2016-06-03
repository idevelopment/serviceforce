<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    /**
     * Mass-assign fields.
     */
    protected $fillable = ['name'];

    /**
     * Hidden fields for the views.
     */
    protected $hidden = ['created_at', 'updated_at'];
}
