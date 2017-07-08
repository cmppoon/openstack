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
$options =[
		'clusterId'  		=> 'b38c705a-edf0-427e-9e76-8dd2ba3a26b7',
		'jobConfigs'		=> [
			'configs'	=> [ 'edp.java.main_class' => 'main.java']
		]
];

$job = $sahara->getJob(['id' => '3ef7c915-d7ac-4571-9d88-7ed363219663' ]);
$job ->executeJob($options);


?>