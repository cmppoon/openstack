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
$dataProcessing = $sahara->getPlugin(['plugin_name' => 'spark', 'versions' => '1.6.0']);
$data = $dataProcessing->retrieveDetails();
$nodeProcesses = $data['node_processes'];
$configs = $data['configs'];
$requiredImageTag = $data['required_image_tags'];
print_r($configs);
print_r($nodeProcesses);
print_r($requiredImageTag);


?>
