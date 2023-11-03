<?php

declare(strict_types=1);

namespace Customer\Controller;

use Application\Controller\AbstractController;
use Exception;
use Laminas\View\Model\ViewModel;

class CustomerController extends AbstractController
{
    public function indexAction()
    {
        try {
            $adapter = $this->getAdapter();
        } catch (Exception $e) {
        }

        return new ViewModel();
    }

    public function createAction()
    {
        $errors = [];
        try {

        } catch (Exception $e) {

        }
    }

    public function saveAction()
    {
        $errors = [];
        try {

        } catch (Exception $e) {

        }
    }
}
