<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1;

use OpenStack\Common\Api\AbstractParams;

class Params extends AbstractParams
{
	public function urlId(string $type): array
	{	
		return array_merge(parent::idPath($type), [
				'required'   => true,
				'location'   => self::URL,
				'documented' => false
		]);
	}
	
	public function isPublic(): array
	{
		return [
				'type'        => self::BOOL_TYPE,
				'sentAs'      => 'is_public',
				'location'    => self::JSON
				
		];
	}
	public function pluginName(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'plugin_name',
				'description' => 'The plugin name of cluster'
		];
	}
	
	public function hadoopVersion(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'hadoop_version',
				'description' => 'The hadoopversion of cluster'
		];
	}
	
	public function clusterTemplateId(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'cluster_template_id',
				'description' => 'The cluster template id'
		];
	}
	
	public function defaultImageId(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'default_image_id',
				'description' => 'The default image id'
		];
	}
	
	public function userKeypairId(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'user_keypair_id',
				'description' => 'The user keypair id'
		];
	}
	
	public function neutronManagementNetwork(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'neutron_management_network',
				'description' => 'The neutron management network'
		];
	}

	public function count(): array
	{
		return [
				'type'        => self::INT_TYPE,
				'required'    => true,
				'sentAs'      => 'count',
				'description' => 'Numbers of cluster to be created'
		];
	}
	
	public function clusterConfigs(): array
	{
		return [
				'type'        => self::OBJECT_TYPE,
				'required'    => false,
				'sentAs'      => 'cluster_configs',
				'description' => 'Configuration of clusters to be created'
		];
	}
//-------------------------------------------------------------------	
	public function isProtected(): array
	{
		return [
				'type'        => self::BOOL_TYPE,
				'sentAs'      => 'is_protected',
				'location'    => self::JSON
		];
	}

	public function dataSourceDescription(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'sentAs'      => 'description',
				'description' => 'The description of the data source object'
		];
	}
	
	public function url(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'url',
				'description' => 'The url of the data source object'
		];
	}
	
	public function dataSourceType(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'type',
				'description' => 'The type of the data source object'
		];
	}
	
	public function dataSourceName(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'required'    => true,
				'sentAs'      => 'name',
				'description' => 'The name of the data source object'
		];
	}

	
	//-----------------james edited ---------------------//
	public function nodeGroups(): array
	{
		return [
				'type'			=> self::ARRAY_TYPE,
				'required'		=> false,
				'sentAs'		=> 'node_groups',
				'description'	=> 'The associated node groups'
		];
		
	}

	
	
}

?>
