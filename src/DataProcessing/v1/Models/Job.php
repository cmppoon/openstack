<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Retrievable;
use OpenStack\Common\Transport\Utils;

class Job extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
    public $description;
    public $tenantId;
    public $createdAt;
    public $mains;
    public $updatedAt;
    public $libs;
    public $isProtected;
    public $interface;
    public $type;
    public $isPublic;
    public $id;
    public $name;

    protected $resourceKey = 'job';
    protected $resourcesKey = 'jobs';

    protected $aliases = [
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt',
        'is_protected' => 'isProtected',
        'tenant_id' => 'tenantId',
        'is_public' => 'isPublic',
    ];

    public function retrieve()
    {
        $response = $this->execute($this->api->getJob(), $this->getAttrs(['id']));
        $this->populateFromResponse($response);
    }

    public function create(array $userOptions): Creatable
    {
        $response = $this->execute($this->api->postJob(), $userOptions);

        return $this->populateFromResponse($response);
    }

    public function delete()
    {
        $this->execute($this->api->deleteJob(), $this->getAttrs(['id']));
    }

    public function update()
    {
        $response = $this->execute($this->api->patchJob(), $this->getAttrs(['id', 'name', 'isPublic', 'description', 'isProtected']));
        $this->populateFromResponse($response);
    }

    public function executeJob(array $options)
    {
        //$options = array_merge($options, $this->getAttrs(['id']));
        $this->execute($this->api->executeJob(), $options);
    }

    public function getJobTypes(array $options = []): array
    {
        $path = '';
        if ($options !== []) {
            $path .= '?';
        }
        if (array_key_exists('plugin', $options)) {
            $path .= '&plugin={plugin}';
        }
        if (array_key_exists('version', $options)) {
            $path .= '&version={version}';
        }
        if (array_key_exists('hints', $options)) {
            $path .= '&hints={hints}';
        }
        $response = $this->execute($this->api->getJobTypes($path), $options);

        return Utils::jsonDecode($response);
    }
}
