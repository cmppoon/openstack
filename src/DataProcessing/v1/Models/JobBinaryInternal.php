<?php declare(strict_types=1);

namespace OpenStack\DataProcessing\v1\Models;

use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\OperatorResource;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Retrievable;

class JobBinaryInternal extends OperatorResource implements Listable, Retrievable, Creatable, Deletable
{
  public $name;
  public $tenantId;
  public $createdId;
  public $updatedAt;
  public $isProtected;
  public $isPublic;
  public $datasize;
  public $id;

  protected $resourceKey = 'job_binary_internal';
  protected $resourcesKey = 'binaries';

  protected $aliases = [
    'tenant_id' => 'tenantId',
    'created_id' => 'createdId',
    'updated_at' => 'updatedAt',
    'is_protected' => 'isProtected',
    'is_public' => 'isPublic'
  ];

  public function retrieve()
  {
    $response = $this->execute($this->api->getJobBinaryInternal(), $this->getAttrs(['id']));
    $this->populateFromResponse($response);
  }

  public function create(array $data): Creatable
  {
    $response=$this->execute($this->api->putJobBinaryInternal(), $data);
    return $this->populateFromResponse($response);
  }

  public function delete()
  {
    $this->execute($this->api->deleteJobBinaryInternal(), $this->getAttrs(['id']));
  }

  //---------please check attribute again-------------
  public function update()
  {
    $response = $this->execute($this->api->patchJobBinaryInternal(), $this->getAttrs(['id','name','isProtected','isPublic']));
    $this->populateFromResponse($response);
  }

  public function downloadData(): StreamInterface
  {
      $response = $this->executeWithState($this->api->getJobBinaryInternalData());
      return $response->getBody();
  }
}
