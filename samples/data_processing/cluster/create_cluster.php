<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

require 'vendor/autoload.php';

use OpenStack\OpenStack;

$openstack = new OpenStack([
    'authUrl' => '{authUrl}',
    'user' => [
        'name' => '{userName}',
        'password' => '{password}',
        'domain' => ['name' => '{userDomain}'],
    ],
    'scope' => [
        'project' => [
             'name' => '{projectName}',
             'domain' => ['name' => '{projectDomain}'],
        ],
    ],
]);

$sahara = $openstack->dataProcessingV1(['region' => '{region}']);

$options = [
    'multiple' => '{createMultipleOrnot}',
    'pluginName' => '{pluginName}',
    'hadoopVersion' => '{hadoopVersion}',
    'clusterTemplateId' => '{clusterTemplateId}',
    'defaultImageId' => '{defaultImageId}',
    //user keypair id is optional
    'userKeypairId' => '{userKeypairId}',
    'name' => '{name}',
    'neutronManagementNetwork' => '{neutronManagementNetwork}',
];

$cluster = $sahara->createCluster($options);
