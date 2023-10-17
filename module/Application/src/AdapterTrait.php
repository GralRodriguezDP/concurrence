<?php

namespace Application;

use Laminas\Db\Adapter\Adapter;

trait AdapterTrait
{
    protected ?Adapter $adapter = null;

    /**
     * @return Adapter
     */
    public function getAdapter(): Adapter
    {
        return $this->adapter;
    }

}