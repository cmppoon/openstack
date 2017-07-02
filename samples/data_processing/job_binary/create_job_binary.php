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
		'url'		   => 'swift://container/jar-example.jar',
		'name'         => 'jar-example.jar',
		'description'  => 'This is a job binary',
		'extra' => [
				'password'=> 'swordfish',
				'user'    => 'admin'
		],
];

$binary = $sahara->createJobBinary($options);

?>

