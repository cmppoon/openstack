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

$options = [
  "pluginName" => "spark",
  "hadoopVersion"=> "1.6.2",
  "nodeProcesses"=> [
    "slave",
    "namenode"
  ],
  "name"=> "testcreate",
  "flavorId"=> "2",
  "isProtected"=>true
];

$template = $sahara->createNodeGroupTemplate($options);

?>
