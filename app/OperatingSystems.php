<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OperatingSystems
 * @package App
 */
class OperatingSystems extends Model
{
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Hidden database field for the view.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
