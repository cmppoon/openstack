<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1;

use OpenStack\Common\Service\AbstractService;
use OpenStack\DataProcessing\v1\Models\Cluster;
use OpenStack\DataProcessing\v1\Models\ClusterTemplate;
use OpenStack\DataProcessing\v1\Models\DataSource;
use OpenStack\DataProcessing\v1\Models\Image;
use OpenStack\DataProcessing\v1\Models\Job;
use OpenStack\DataProcessing\v1\Models\JobBinary;
use OpenStack\DataProcessing\v1\Models\JobBinaryInternal;
use OpenStack\DataProcessing\v1\Models\JobConfig;
use OpenStack\DataProcessing\v1\Models\JobExecution;
use OpenStack\DataProcessing\v1\Models\NodeGroup;
use OpenStack\DataProcessing\v1\Models\NodeGroupTemplate;
use OpenStack\DataProcessing\v1\Models\Pluging;
class Service extends AbstractService
{
//-----------------------------CLUSTER----------------------------------------

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

	public function scaleCluster(array $options = []): Cluster
	{
		return $this->model(Cluster::class)->scale($options);
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





	//--------------start----nodegrouptemplate------------------//
	public function getNodeGroupTemplate(array $options = []): NodeGroupTemplate
	{
		$nodeGroupTemplate = $this->model(NodeGroupTemplate::class);
		$nodeGroupTemplate->populateFromArray($options);
		return $nodeGroupTemplate;
	}

	public function listNodeGroupTemplates(array $options = [], callable $mapFn = null): \Generator
	{
		return $this->model(NodeGroupTemplate::class)->enumerate($this->api->getNodeGroupTemplates(), $options, $mapFn);
	}

	public function createNodeGroupTemplate(array $options = []): NodeGroupTemplate
	{
		return $this->model(NodeGroupTemplate::class)->create($options);
	}
	//--------------end----nodegrouptemplate------------------//

	//--------------start----job bianry------------------//
	public function listJobBinaries(array $options = [], callable $mapFn = null): \Generator
	{
		return $this->model(JobBinary::class)->enumerate($this->api->getJobBinaries(), $options, $mapFn);
	}

	public function getJobBinary(array $options = []): JobBinary
	{
		$binary = $this->model(JobBinary::class);
		$binary->populateFromArray($options);
		return $binary;
	}

	public function createJobBinary(array $options = []): JobBinary
	{
		return $this->model(JobBinary::class)->create($options);
	}

	//--------------end----job bianry------------------//

	//--------------start----job bianry internal------------------//
	public function getJobBinaryInternal(array $options = []): JobBinaryInternal
	{
		if(!empty($options->$name)){
			$createoption=[
				'name'=>$option->name
			]
			return $this->model(JobBinaryInternal::class)->create($createoption);
		}
		$jobBinaryInternal = $this->model(JobBinaryInternal::class);
		$jobBinaryInternal->populateFromArray($options);
		return $jobBinaryInternal;
	}

	public function listJobBinaryInternals(array $options = [], callable $mapFn = null): \Generator
	{
		return $this->model(JobBinaryInternal::class)->enumerate($this->api->getJobBinaryInternals(), $options, $mapFn);
	}

	public function createJobBinaryInternal(array $data): JobBinaryInternal
	{
		return $this->model(JobBinaryInternal::class)->create($data);
	}
	//--------------end----job bianry internal------------------//


	//////--------------- Job--------------------------/////
	public function createJob(array $options = []): Job
	{
		return $this->model(Job::class)->create($options);
	}

	public function getJob(array $options = []):Job
	{
		$Job = $this->model(Job::class);
		$Job->populateFromArray($options);
		return $Job;
	}
	public function listJob(array $options = [], callable $mapFn = null): \Generator
	{
		return $this->model(Job::class)->enumerate($this->api->getJob(), $options, $mapFn);
	}
	
}

?>
