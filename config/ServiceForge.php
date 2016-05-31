<?php

return [
    /*
     | --------------------------------------------------------------------------
     | LeaseWeb API
     | --------------------------------------------------------------------------
     |
     | Here are the configuration for the LeaseWeb API setting
     |
     | [leaseweb.apikey]      = Your apikey.
     | [leaseweb.urls.server] = The server resource link.
     | [leaseweb.urls.power]  = The power resource link.
     | [leaseweb.urls.switch] = The network switch resource link.
     | [leaseweb.urls.ip]     = The network ip resource link.
     */
    'leaseweb' => [
        'apikey' => env('LEASEWEB_KEY', 'default apikey'),
        'urls'   => [
            'server' => env('LEASEWEB_URL', 'url') . '/bareMetals/' . env('LEASEWEB_USER', 'api user'),
            'power'  => env('LEASEWEB_URL', 'url') . '/bareMetals/' . env('LEASEWEB_USER', 'api user') . '/powerStatus',
            'switch' => env('LEASEWEB_URL', 'url') . '/bareMetals/' . env('LEASEWEB_USER', 'api user') . '/switchPort',
            'ip'     => env('LEASEWEB_URL', 'url') . '/bareMetals/' . env('LEASEWEB_USER', 'api user') . '/ips',
        ]
    ],
];