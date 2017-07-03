<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Retrievable;

class Job extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
	public $neutronManagementNetwork;
    public $description;
    public $shares;
    public $clusterConfigs;
    public $createdAt;
    public $defaultImage;
    public $updatedAt;
    public $pluginName;
    public $domainName;
    public $isDefault;
    public $isProtected;
    public $useAutoconfig;
    public $antiAffinity;
    public $tenantId;
    public $nodeGroups;
	public $isPublic;
	public $hadoopVersion;
	public $id;
	public $name;
	
	
	protected $resourceKey = 'job';
	protected $resourcesKey = 'jobs';
	
	protected $aliases = [
		'neutron_management_network'		=> 'neutronManagementNetwork',
		'cluster_configs'					=> 'clusterConfigs',
		'created_at'						=> 'createdAt',
		'default_image'						=> 'defaultImage',
		'updated_at'						=>	'updatedAt',
		'plugin_name'						=>	'pluginName',
		'domain_name'						=>	'domainName',
		'is_default'						=> 	'isDefault',
		'is_protected'						=>	'isProtected',
		'use_autoconfig'					=>	'useAutoconfig',
		'anti_affinity'						=>	'antiAffinity',
		'tenant_id'							=>	'tenantId',
		'node_groups'						=>	'nodeGroups',
		'is_public'							=> 	'isPublic',
		'hadoop_version'					=>	'hadoopVersion'
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
		$response = $this->execute($this->api->putJob(), $this->getAttrs(['id', 'name','isPublic','pluginName','hadoopVersion']));
		$this->populateFromResponse($response);
	}
}