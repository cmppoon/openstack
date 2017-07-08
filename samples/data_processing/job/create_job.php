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
		'description'  	=> 'Pig Job Sample',
		'mains' 		=>[ '6f6befc8-fc97-4a14-844a-7ce4d866840b'],
		'libs' 			=> ['373d640a-d214-43be-8a56-04fac9076049'],
		'type'			=> 'Pig',
		'name' 			=> 'Pig'
		
];

$job= $sahara->createJob($options);
print_r($job);

?>