<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v2;

use OpenStack\Common\Api\AbstractApi;

class Api extends AbstractApi
{
	public function __construct()
	{
		$this->params = new Params();
	}
	
	public function getClusters(): array
	{
		
	}
	
	public function getCluster(): array
	{
		
	}
}

?>