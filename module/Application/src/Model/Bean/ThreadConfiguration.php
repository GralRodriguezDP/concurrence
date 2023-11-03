<?php

declare(strict_types=1);

namespace Application\Model\Bean;

use DateTime;

class ThreadConfiguration
{

    protected int $idConcurrenceConfiguration;

    protected int $idProcess;

    protected int $status;

    protected float $relation;

    protected DateTime $created;

    protected const ID_CONCURRENCE_CONFIGURATION = 'id_concurrence_configuration';

    protected const ID_PROCESS = 'id_process';

    protected const STATUS = 'status';

    protected const RELATION = 'relation';

    protected const CREATED = 'created';

    /**
     * @return int
     */
    public function getIdConcurrenceConfiguration(): int
    {
        return $this->idConcurrenceConfiguration;
    }

    /**
     * @param int $idConcurrenceConfiguration
     */
    public function setIdConcurrenceConfiguration(int $idConcurrenceConfiguration): void
    {
        $this->idConcurrenceConfiguration = $idConcurrenceConfiguration;
    }

    /**
     * @return int
     */
    public function getIdProcess(): int
    {
        return $this->idProcess;
    }

    /**
     * @param int $idProcess
     */
    public function setIdProcess(int $idProcess): void
    {
        $this->idProcess = $idProcess;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return float
     */
    public function getRelation(): float
    {
        return $this->relation;
    }

    /**
     * @param float $relation
     */
    public function setRelation(float $relation): void
    {
        $this->relation = $relation;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            self::ID_CONCURRENCE_CONFIGURATION => self::getIdConcurrenceConfiguration(),
            self::ID_PROCESS => self::getIdProcess(),
            self::STATUS => self::getStatus(),
            self::RELATION => self::getRelation(),
            self::CREATED => self::getCreated(),
        ];
    }

}