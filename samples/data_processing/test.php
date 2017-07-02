#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use OpenStack\OpenStack;

$openstack = new OpenStack([
    'authUrl' => 'http://203.185.71.2:5000/v3/',
    'user'    => [
        'name'       => 'siit',
        'password' => 'Siit#60!',
        'domain' => [ 'name' => 'Default' ]
    ],
    'scope'   => [
        'project' => [
             'name' => 'php',
             'domain' => [ 'name' => 'Default' ]
        ]
    ]
]);

$compute = $openstack->computeV2(['region' => 'RegionOne']);


$options = [
		// Required
		'name'     => 'serverName',
		'imageId'  => 'imageId',
		'flavorId' => 'flavorId',
		
		// Required if multiple network is defined
		'networks'  => [
				['uuid' => 'networkId']
		],
		
		// Optional
		'metadata' => ['foo' => 'bar'],
		'userData' => base64_encode('echo "Hello World. The time is now $(date -R)!" | tee /root/output.txt')
];

// Create the server
/**@var OpenStack\Compute\v2\Models\Server $server */
$server = $compute->createServer($options);

