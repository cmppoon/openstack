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
$plugin = $sahara->getPlugin(['plugin_name' => '{name}']);

$plugin->pluginLabels = [
							'enabled' => [
											'status' => true 
							]
						];

// $options = [
// 		'id' => '{clusterId}',
// 		'addNodeGroups' => [[
// 				'count' =>'{count}',
// 				'name'  => '{name}',
// 				'nodeGroupTemplateId' => '{nodeGroupTemplateId}'
// 		]],
// 		'resizeNodeGroups' => [[
// 				'count' => '{count}',
// 				'name'  => '{name}'
// 		]]
// ];

$plugin->update();

?>
