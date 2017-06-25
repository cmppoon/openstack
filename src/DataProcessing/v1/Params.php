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
				'type'        => self::STRING_TYPE,
				'sentAs'      => 'is_public',
				'location'    => self::JSON
				
		];
	}
	
}

?>
