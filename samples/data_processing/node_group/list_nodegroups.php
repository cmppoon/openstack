#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use OpenStack\OpenStack;
use OpenStack\Common\Transport\Utils;

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



$nodegroups = $sahara->listNodeGroups();
foreach($nodegroups as $nodegroup){
  $thereal =  (array)$nodegroup;
  print_r($thereal['nodeGroups']);
}




// $clusters = $sahara->listClusters();
// foreach($clusters as $cluster){
//   print_r($cluster['resourceKey']);
// }
// print($clusters['resourceKey']);


$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
print($age['Peter']);
print_r($age);

?>
