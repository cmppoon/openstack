<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Retrievable;

class Cluster extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
	public function retrieve()
	{
		
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function create(array $userOptions): Creatable
	{
		
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function delete()
	{
		
	}
}

?>