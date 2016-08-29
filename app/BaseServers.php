<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseServers
 * @package App
 */
class BaseServers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bareMetalId', 'serverName', 'serverType', 'serverStatus', 'serverState', 'reference', 'ServerLocation_id',
        'Server_id', 'network_informations_id', 'serverHostingPack', 'sla_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Get the Service Level Agreement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sla()
    {
        return $this->belongsTo('App\Sla');
    }

    /**
     * Get the server location information
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serverLocation()
    {
        return $this->belongsTo('App\ServerLocation', 'ServerLocation_id', 'id');
    }

    /**
     * Get the data about the server hosting pack.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hostingPack()
    {
        return $this->belongsTo('App\serverHostingPack', 'serverHostingPack', 'id');
    }

    /**
     * Get the server information data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serverInfo()
    {
        return $this->belongsTo('App\Server', 'Server_id', 'id');
    }

    /**
     * Get the network information data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function networkInfo()
    {
        return $this->belongsTo('App\NetworkInformation', 'network_informations_id', 'id');
    }
    public function notes()
    {
        return $this->belongsToMany('App\Notes');
    }
}
