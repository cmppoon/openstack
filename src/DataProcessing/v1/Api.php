<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1;

use OpenStack\Common\Api\AbstractApi;

class Api extends AbstractApi
{
	public function __construct()
	{
		$this->params = new Params();
	}
	
	public function getClusters(): array
	{
		return [
				'method' => 'GET',
				'path'   => 'v1.1/{id}/clusters',
				'params' => ['id' => $this->params->urlId('project')]
		];
	}
	
	public function getCluster(): array
	{
		
	}
}

?>