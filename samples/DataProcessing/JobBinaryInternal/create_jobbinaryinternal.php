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

$sahara = $openstack->dataProcessingV1(['region' => 'RegionOne']);

$filename = "test-create1.jpg";
$JobBinaryInternal = $sahara->getJobBinaryInternal(['name' => $filename]);
$stream = \GuzzleHttp\Psr7\stream_for(fopen($filename, 'r'));
$JobBinaryInternal = $sahara->createJobBinaryInternal($stream);


?>
