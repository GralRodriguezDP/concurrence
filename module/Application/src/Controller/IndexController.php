<?php

declare(strict_types=1);

namespace Application\Controller;

use Exception;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        try {
            $adapter = $this->getAdapter();
            //$adapter->query();

        } catch (Exception $e) {

        }

        return new ViewModel();
    }

    public function createAction()
    {
    }

    public function saveAction()
    {
    }
}
