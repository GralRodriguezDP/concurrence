<?php

namespace Application\Controller;

use Laminas\Db\Adapter\Adapter;

class AbstractController extends \Laminas\Mvc\Controller\AbstractActionController
{
    private Adapter $adapter;

    private array $config = [];

    /**
     * @return Adapter
     */
    public function getAdapter(): Adapter
    {
        return $this->adapter;
    }

    /**
     * @param Adapter $adapter
     */
    public function setAdapter(Adapter $adapter): void
    {
        $this->adapter = $adapter;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config): void
    {
        $this->config = $config;
    }






}