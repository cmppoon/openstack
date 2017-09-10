<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\OperatorResource;

class NodeGroup extends OperatorResource implements Listable
{
    public $nodeGroups;

    protected $resourceKey = 'cluster';
    protected $resourcesKey = 'clusters';

    protected $aliases = [
        'node_groups' => 'nodeGroups',
    ];
}
