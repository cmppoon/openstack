<?php declare(strict_types=1);

namespace OpenStack\Compute\v2\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Retrievable;

class NodeGroup extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{

}