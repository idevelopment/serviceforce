<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notes
 * @package App
 */
class Notes extends Model
{
    /**
     * Mass-assign columns
     *
     * @var array
     */
    protected $fillable = ['note', 'title', 'user_id'];

    /**
     * Hidden fields for the output.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Notes -> Staff relation.
     * Used: To dedicate who has create the note.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
