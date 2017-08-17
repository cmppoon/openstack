<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;


class JobConfig extends OperatorResource implements Listable
{
	public $id; //id of jobs
	public $jobConfigs;
	
	protected $resourceKey = 'job_execution';
	protected $resourcesKey = 'job_executions';
	
	protected $aliases = [
			'job_configs'  => 'jobConfigs',
	];
	
	public function retrieve()
	{
		$response = $this->execute($this->api->getJobConfig(), $this->getAttrs(['id']));
		$this->populateFromResponse($response);
	}
}

?>