<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Retrievable;

class Image extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
  public $status;
  public $username;
  public $updated;
  public $OSEXTIMGSIZEsize;
  public $created;
  public $tags;
  public $minDisk;
  public $name;
  public $progress;
  public $minRam;
  public $metadata;
  public $id;
  public $description;

  protected $aliases = [
			'OS-EXT-IMG-SIZE:size'					=>	'OSEXTIMGSIZEsize'
	];
}
