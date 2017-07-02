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
		'id' => '7d29c89f-8ba7-42be-9113-e09fcd57e659',
		'addNodeGroups' => [[
				'count' => 2,
				'name'  => 'eiei',
				'nodeGroupTemplateId' => '95586455-8e59-4cca-9a4a-52a8e1cb8a13'
		]],
		'resizeNodeGroups' => [[
				'count' => 1,
				'name'  => 'worker'
		]]
		
];

$cluster = $sahara->scaleCluster($options);

?>

