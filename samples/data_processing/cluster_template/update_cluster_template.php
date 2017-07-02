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
$clusterTemplate = $sahara->getClusterTemplate(['id' => '7a8d9deb-a8cb-4ac2-9c73-e458b46f2c70']);
$clusterTemplate->name = 'Heeh';
$clusterTemplate->isPublic = true;
$clusterTemplate->pluginName = 'spark';
$clusterTemplate->hadoopVersion = '1.6.2';
$clusterTemplate->update();
print_r($clusterTemplate);
?>

