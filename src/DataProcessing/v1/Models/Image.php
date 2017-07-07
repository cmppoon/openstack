<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
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
			'OS-EXT-IMG-SIZE:size'					=>	'OSEXTIMGSIZEsize'
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
    $response = $this->execute($this->api->postImage(), $userOptions);
    return $this->populateFromResponse($response);
  }

  public function addTags(array $userOptions)
  {
    $response = $this->execute($this->api->postImage(), $userOptions);
    return $this->populateFromResponse($response);
  }

  public function removeTags(array $userOptions)
  {
    $response = $this->execute($this->api->postImage(), $userOptions);
    return $this->populateFromResponse($response);
  }

}
