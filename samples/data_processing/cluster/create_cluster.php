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
		'multiple'		 => false,
		'pluginName'     => 'spark',
		'hadoopVersion'  => '1.6.2',
		'clusterTemplateId' => 'cab21f5c-b264-465a-a999-55dfe2fbab94',
		'defaultImageId' => 'f56cc7c5-9588-49fa-8bcd-5c5d5eda5466',
		//user keypair id is optional ?
		'userKeypairId'  => 'phpkey',
		'name' => 'test',
		'neutronManagementNetwork' => '10fa537e-dfc6-4f03-aff3-af05380a0be5'
];

$cluster = $sahara->createCluster($options);

?>

