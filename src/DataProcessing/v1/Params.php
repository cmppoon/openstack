<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1;

use OpenStack\Common\Api\AbstractParams;

class Params extends AbstractParams
{
	public function urlId(string $type): array
	{
		return array_merge(parent::id($type), [
				'required'   => true	,
				'location'   => self::URL,
				'documented' => false,
		]);
	}
}



?>