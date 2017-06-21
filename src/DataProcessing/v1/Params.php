<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v2;

use OpenStack\Common\Api\AbstractParams;

class Params extends AbstractParams
{
	public function getProjectid(): array
	{
		return [
				'type'        => self::STRING_TYPE,
				'location'    => self::URL,
				'required'    => true,
				'description' => 'UUID of the project',
		];
	}
}
