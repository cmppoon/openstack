<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1;

use OpenStack\Common\Service\AbstractService;
use OpenStack\DataProcessing\v1\Models\Cluster;
use OpenStack\DataProcessing\v1\Models\ClusterTemplate;
use OpenStack\DataProcessing\v1\Models\DataSource;
use OpenStack\DataProcessing\v1\Models\Image;
use OpenStack\DataProcessing\v1\Models\Job;
use OpenStack\DataProcessing\v1\Models\JobBinary;
use OpenStack\DataProcessing\v1\Models\JobConfig;
use OpenStack\DataProcessing\v1\Models\JobExecution;
use OpenStack\DataProcessing\v1\Models\NodeGroup;
use OpenStack\DataProcessing\v1\Models\NodeGroupTemplate;
use OpenStack\DataProcessing\v1\Models\Pluging;
class Service extends AbstractService
{
	public function listClusters(array $options = [], callable $mapFn = null): \Generator
	{
		return $this->model(Cluster::class)->enumerate($this->api->getClusters(), $options, $mapFn);
	}
	
	public function getCluster(array $options = []): Cluster
	{
		$cluster = $this->model(Cluster::class);
		$cluster->populateFromArray($options);
		return $cluster;
	}
	
	public function createCluster(array $options = []): Cluster
	{
		return $this->model(Cluster::class)->create($options);
	}
	//-----------------------------------------------------------------
	public function createDataSource(array $options = []): Datasource
	{
		return $this->model(DataSource::class)->create($options);
	}
	
	public function getDataSource(array $options = []): Datasource
	{
		$source = $this->model(DataSource::class);
		$source->populateFromArray($options);
		return $source;
	}
	
	public function listDataSources(array $options = [], callable $mapFn = null): \Generator
	{
		return $this->model(DataSource::class)->enumerate($this->api->getDataSources(), $options, $mapFn);
	}
	
<<<<<<< HEAD
	//////--------------- cluster-template --------------------------/////
	public function createClusterTemplate(array $options = []): ClusterTemplate
	{
		return $this->model(ClusterTemplate::class)->create($options);
	}
	
	public function getClusterTemplate(array $options = []): ClusterTemplate
	{
		$clusterTemplate = $this->model(ClusterTemplate::class);
		$clusterTemplate->populateFromArray($options);
		return $clusterTemplate;
	}
	public function listClusterTemplates(array $options = [], callable $mapFn = null): \Generator
	{
		return $this->model(ClusterTemplate::class)->enumerate($this->api->getClusterTemplates(), $options, $mapFn);
	}
	
=======
>>>>>>> 32b45515bbae8db15d5b5647d82e9363a663e8cb
}

?>