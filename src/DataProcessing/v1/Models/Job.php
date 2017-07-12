<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Retrievable;

class Job extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
    public $description;
    public $createdAt;
    public $mains;
    public $libs;
    public $isProtected;
    public $interface;
    public $tenantId;
    public $type;
	public $isPublic;
	public $id;
	public $name;
	
	
	protected $resourceKey = 'job';
	protected $resourcesKey = 'jobs';
	
	protected $aliases = [
		'created_at'						=> 'createdAt',
		'is_protected'						=>	'isProtected',
		'tenant_id'							=>	'tenantId',
		'is_public'							=> 	'isPublic'
    ];
	
		public function retrieve()
	{
		$response = $this->execute($this->api->getJob(), $this->getAttrs(['id']));
		$this->populateFromResponse($response);
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function create(array $userOptions): Creatable
	{
		$response=$this->execute($this->api->postJob(), $userOptions);
		return $this->populateFromResponse($response);
	}
	
	/**
	 * {@inheritDoc}	
	 */
	public function delete()
	{
		$this->execute($this->api->deleteJob(), $this->getAttrs(['id']));
	}
	
	public function update()
	{
		$response = $this->execute($this->api->patchJob(), $this->getAttrs(['id', 'name','isPublic','description','isProtected']));
		$this->populateFromResponse($response);
	}
	
	public function executeJob(array $options)
    {
        //$options = array_merge($options, $this->getAttrs(['id']));
        $this->execute($this->api->executeJob(), $options);
		
    }	

}