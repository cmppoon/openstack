<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;


use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Retrievable;

class JobExecution extends OperatorResource implements Listable, Retrievable, Deletable
{
	public $info;
    public $outputId;
    public $startTime;
    public $jobId;
    public $updatedAt;
    public $tenantId;
    public $createdAt;
    public $data_source_urls;
	public $returnCode;
	public $oozieJobId;
	public $isProtected;
	public $clusterId;
	public $endTime;
	public $isPublic;
	public $inputId;
	public $configs;
	public $jobExecution;
	public $id;
	
	
	protected $resourceKey = 'job_execution';
	protected $resourcesKey = 'job_executions';
	
	protected $aliases = [
		
    ];
	
		public function retrieve()
	{
		$response = $this->execute($this->api->getJobExecution(), $this->getAttrs(['id']));
		$this->populateFromResponse($response);
	}
	
	/**
	 * {@inheritDoc}	
	/**
	 * {@inheritDoc}	
	 */
	public function delete()
	{
		$this->execute($this->api->deleteJobExecution(), $this->getAttrs(['id']));
	}
	
	public function update()
	{
		$response = $this->execute($this->api->patchJobExecution(), $this->getAttrs(['id', 'name','isPublic','description','isProtected']));
		$this->populateFromResponse($response);
	}
	
	public function cancel()
	{
		$response = $this->execute($this->api->cancelJob(), $this->getAttrs(['id']));
		$this->populateFromResponse($response);
	}
	
}