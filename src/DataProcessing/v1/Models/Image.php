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

class Image extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
    public $status;
    public $username;
    public $updated;
    public $OSEXTIMGSIZEsize;
    public $created;
    public $tags;
    public $minDisk;
    public $name;
    public $progress;
    public $minRam;
    public $metadata;
    public $id;
    public $description;

    protected $resourceKey = 'image';
    protected $resourcesKey = 'images';

    protected $aliases = [
        'OS-EXT-IMG-SIZE:size' => 'OSEXTIMGSIZEsize',
    ];

    public function create(array $userOptions): Creatable
    {
        $response = $this->execute($this->api->postImage(), $userOptions);

        return $this->populateFromResponse($response);
    }

    public function retrieve()
    {
        $response = $this->execute($this->api->getImage(), $this->getAttrs(['id']));
        $this->populateFromResponse($response);
    }

    public function delete()
    {
        $this->execute($this->api->deleteImage(), $this->getAttrs(['id']));
    }

    public function update()
    {
        $response = $this->execute($this->api->patchImage(), $this->getAttrs(['id', 'description', 'name', 'isPublic', 'isProtected']));
        $this->populateFromResponse($response);
    }

    public function register(array $userOptions)
    {
        $response = $this->execute($this->api->postImage(), array_merge($this->getAttrs(['id']), $userOptions));

        return $this->populateFromResponse($response);
    }

    public function unregister()
    {
        $this->execute($this->api->deleteImage(), $this->getAttrs(['id']));
    }

    public function addTags(string $username, string $tag)
    {
        $userOptions = array_merge($this->getAttrs(['id']), ['tags' => [$username, $tag]]);
        $response = $this->execute($this->api->postImageTag(), $userOptions);

        return $this->populateFromResponse($response);
    }

    public function removeTags(string $username, string $tag)
    {
        $userOptions = array_merge($this->getAttrs(['id']), ['tags' => [$username, $tag]]);
        $response = $this->execute($this->api->unPostImageTag(), $userOptions);

        return $this->populateFromResponse($response);
    }
}
