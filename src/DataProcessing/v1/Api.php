<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v2;

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
				'path'   => 'v1.1/{project_id}/clusters',
				'params' => [
						'limit'   => $this->params->limit(),
						'marker'  => $this->params->marker(),
						'minDisk' => $this->params->minDisk(),
						'minRam'  => $this->params->minRam(),
				],
		];
	}
	
	public function getCluster(): array
	{
		return [
				'method' => 'GET',
				'path'   => 'v1.1/{project_id}/clusters/{cluster_id}',
				'params' => ['id' => $this->params->urlId('flavor')]
		];
	}
}

?>