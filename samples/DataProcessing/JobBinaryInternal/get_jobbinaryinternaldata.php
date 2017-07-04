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

$internal = $sahara->getJobBinaryInternal(['id' => '7a82f8c1-567f-4da9-815b-182c201124fe']);
$stream = $internal->downloadData();
