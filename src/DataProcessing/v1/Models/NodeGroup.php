<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;


class NodeGroup extends OperatorResource implements Listable
{
	public $nodeGroups;

	protected $resourceKey = 'cluster';
	protected $resourcesKey = 'clusters';
	
	protected $aliases = [
			'node_groups'  => 'nodeGroups',
	];
	
	
}