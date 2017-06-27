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
				'path'   => 'clusters',
				'params' => [
						'limit'        => $this->params->limit(),
						'marker'       => $this->params->marker()
				]
		];
	}
	
	public function getCluster(): array
	{
		return [
				'method' => 'GET',
				'path'   => 'clusters/{id}',
				'params' => [
						'id'           => $this->params->urlId('cluster'),
						'limit'        => $this->params->limit(),
						'marker'       => $this->params->marker()
				]
		];
	}
	
	public function deleteCluster(): array
	{
		return [
				'method' => 'DELETE',
				'path'   => 'clusters/{id}',
				'params' => ['id' => $this->params->urlId('cluster')],
		];
	}
	
	public function patchCluster(): array
	{
		return [
				'method'  => 'PATCH',
				'path'    => 'clusters/{id}',
				'params'  => [
						'id'   => $this->params->urlId('cluster'),
						'isPublic' => $this->params->isPublic(),
						'name' => $this->params->name('cluster'),
				],
		];
	}
	
	public function postCluster(): array
	{
		return [
				'path'    => 'clusters',
				'method'  => 'POST',
				'params'  => [
						'pluginName'            => $this->params->pluginName(),
						'hadoopVersion'           => $this->params->hadoopVersion(),
						'clusterTemplateId'        => $this->params->clusterTemplateId(),
						'defaultImageId'           => $this->params->defaultImageId(),
						'userKeypairId'               => $this->notRequired($this->params->userKeyPairId()),
						'name'     => $this->isRequired($this->params->name('cluster')),
						'neutronManagementNetwork'           => $this->params->neutronManagementNetwork()
				]
		];
	}
	
	public function postClusters(): array
	{
		$definition = $this->postCluster();
		$definition['path'] .= '/multiple';
		$definition['params'] = array_merge($definition['params'],[
			'count' => $this->params->count(),
			'clusterConfigs' => $this->params->clusterConfigs()	
		]);
		return $definition;
	}
	
}

?>