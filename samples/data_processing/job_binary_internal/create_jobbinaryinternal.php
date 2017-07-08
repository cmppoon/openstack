#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use OpenStack\OpenStack;

$openstack = new OpenStack([
		'authUrl' => '{authUrl}',
		'user'    => [
				'name'       => '{userName}',
				'password' => '{password}',
				'domain' => [ 'name' => '{userDomain}' ]
		],
		'scope'   => [
				'project' => [
						'name' => '{projectName}',
						'domain' => [ 'name' => '{projectDomain}' ]
				]
		]
]);

$sahara = $openstack->dataProcessingV1(['region' => '{region}']);

$filename = "testfin2.txt";
$JobBinaryInternal = $sahara->getJobBinaryInternal(['name' => $filename]);
$stream = \GuzzleHttp\Psr7\stream_for(fopen($filename, 'r'));
// $options=[
//   'name' => $filename,
//   'data' => $stream
// ];
$JobBinaryInternal = $sahara->createJobBinaryInternal($stream);

// print_r($stream->getMetadata('uri')); //filename
// print_r($stream->__toString()); //data

?>
