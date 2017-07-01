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
		'pluginName'     => 'spark',
		'hadoopVersion'  => '1.6.2',
		'nodeGroups' => [
				[
				'name'  => 'master',
				'count' => 1,
				'nodeGroupTemplateId' => '1d28c842-b8d9-4ca4-8fe8-1fd586758816'
				],
				[
				'name'  => 'worker',
				'count' => 1,
				'nodeGroupTemplateId' => '51401185-468c-4cf7-9d9d-a8ea3ab0d196'
				],
				[
				'name'  => 'core',
				'count' => 1,
				'nodeGroupTemplateId' => '7f414a63-7e14-4153-a297-d51dbc3fdcf2'
				]
		],
		'name' => 'PlsPass'
		
];

$clusterTemplate = $sahara->createClusterTemplate($options);
print_r($clusterTemplate);

?>

