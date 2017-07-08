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

$internal = $sahara->getJobBinaryInternal(['id' => '995d9bad-edc1-4713-aab2-d893ed51d0ba']);
$internal->name = 'testUpdate';
$internal->isPublic = false;
$internal->isProtected = false;
$internal->update();
?>
