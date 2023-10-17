<?php

declare(strict_types=1);

namespace Application\Controller;

use DateTime;
use Exception;
use Laminas\Db\Sql\Sql;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\View\Model\ViewModel;

class ConcurrenceConfigurationController extends AbstractController
{
    private string $configurationTableName = 'concurence_threads_configuration';

    public function indexAction()
    {
        try {
            $adapter = $this->getAdapter();
            $sql = new Sql($adapter);

            $select = $sql->select()->from($this->configurationTableName);

            $statement = $sql->prepareStatementForSqlObject($select);
            $result = $statement->execute();
            $result = $statement->getResource();
        } catch (Exception $e) {
            print_r($e);
        }

        return new ViewModel(
            [
                'result' => $result,
            ]
        );
    }

    public function createAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $request->getPost();
            print_r($data);

            $relation = isset($data['relation']) ? $data['relation'] : null;

            if (!$relation) {
                throw new Exception("Relacion no definida");
            }

            $values = [
                'status' => 1,
                'relation' => 1 / $relation,
                'created' => (new DateTime())->format('Y-m-d H:i:s'),
            ];



            try {
                $tableGateway = new TableGateway($this->configurationTableName);
                $adapter = $this->getAdapter();
                $sql = new Sql($adapter);
                $insert = $sql->insert($this->configurationTableName);
                $insert->values($values);

            } catch (Exception $e) {
                print_r($e);
            }
        }
        //$response = $this->redirect()->toRoute('config');
    }

    public function saveAction()
    {
    }
}
