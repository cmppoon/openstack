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

$image = $sahara->getImage(['id' => '{imageId}']);

// $image->removeTags('centos', '6.8');
// print_r($image);

$options = [
		'id' => '{imageId}',
		'tags' => ['centos','6.8']
		];

$image->removeTags($options);
print_r($image);
?>
