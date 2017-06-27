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
	
	public function createCluster(bool $multiple = false,array $options = []): Cluster
	{
		return $this->model(Cluster::class)->create($multiple,$options);
	}
}

?>