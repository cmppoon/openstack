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

class DataSource extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
    public $description;
    public $url;
    public $tenantId;
    public $createdAt;
    public $updatedAt;
    public $isProtected;
    public $isPublic;
    public $type;
    public $id;
    public $name;

    protected $resourceKey = 'data_source';
    protected $resourcesKey = 'data_sources';

    protected $aliases = [
        'tenant_id' => 'tenantId',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt',
        'is_protected' => 'isProtected',
        'is_public' => 'isPublic',
    ];

    public function create(array $userOptions): Creatable
    {
        $response = $this->execute($this->api->postDataSource(), $userOptions);

        return $this->populateFromResponse($response);
    }

    public function retrieve()
    {
        $response = $this->execute($this->api->getDataSource(), $this->getAttrs(['id']));
        $this->populateFromResponse($response);
    }

    public function delete()
    {
        $this->execute($this->api->deleteDataSource(), $this->getAttrs(['id']));
    }

    public function update()
    {
        $response = $this->execute($this->api->putDataSource(), $this->getAttrs(['id', 'description', 'name', 'isPublic', 'isProtected', 'url', 'type']));
        $this->populateFromResponse($response);
    }
}
