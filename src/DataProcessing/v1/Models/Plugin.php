<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Retrievable;

class Plugin extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
  public $description;
  public $versions;
	public $versionLabels;
	public $title;
	public $pluginLabels;
	public $pluginName;

  protected $resourceKey = 'plugin';
	protected $resourcesKey = 'plugins';

  protected $aliases = [
			'version_labels'			=>	'versionLabels',
			'plugin_labels'				=>	'pluginLabels',
      'plugin_name'         =>  'pluginName'
	];

  public function create(array $userOptions): Creatable
  {
  }

  public function delete()
  {
  }

  public function retrieve()
	{
		$response = $this->execute($this->api->getPlugin(), $this->getAttrs(['pluginName']));
		$this->populateFromResponse($response);
	}

  public function retrieveDetails()
	{
		$response = $this->execute($this->api->getPlugin(), $this->getAttrs(['pluginName','versions']));
		$this->populateFromResponse($response);
	}

	// public function update()
	// {
	// 	$response = $this->execute($this->api->patchPlugin(), $this->getAttrs([]));
	// 	$this->populateFromResponse($response);
	// }

}
