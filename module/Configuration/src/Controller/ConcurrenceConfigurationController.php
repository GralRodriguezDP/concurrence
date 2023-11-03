<?php

declare(strict_types=1);

namespace Configuration\Controller;

use Application\Controller\AbstractController;
use DateTime;
use Exception;
use Laminas\Db\Sql\Sql;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\View\Model\ViewModel;

class ConcurrenceConfigurationController extends AbstractController
{
    private string $configurationTableName = 'concurence_threads_configuration';

    /**
     * @return ViewModel
     */
    public function indexAction(): ViewModel
    {
        $results = null;
        try {
            $adapter = $this->getAdapter();
            $sql = new Sql($adapter);
            $select = $sql->select($this->configurationTableName);
            $selectString = $sql->buildSqlString($select);
            $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);

            // $statement = $sql->prepareStatementForSqlObject($select);
            // $result = $statement->execute();
            // $result = $statement->getResource();
        } catch (Exception $e) {
            print_r($e);
        }

        return new ViewModel(
            [
                'results' => $results,
            ]
        );
    }

    /**
     * @throws Exception
     */
    public function createAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $request->getPost();

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
                $adapter = $this->getAdapter();
                $sql = new Sql($adapter);
                $insert = $sql->insert($this->configurationTableName);
                $insert->values($values);

                //$tableGateway = new TableGateway($this->configurationTableName, $adapter);
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
