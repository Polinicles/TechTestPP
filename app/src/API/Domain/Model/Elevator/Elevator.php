<?php

namespace App\API\Domain\Model\Elevator;

use App\Shared\Domain\Aggregate\AggregateRoot;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\UuidInterface;

final class Elevator implements AggregateRoot
{
    const STATUS_AVAILABLE = 'available';

    const STATUS_OCUPIED = 'ocupied';

    const INITIAL_FLOOR = 0;

    /** @var int|null */
    private $id;

    /** @var UuidInterface */
    private $uuid;

    /** @var int */
    private $currentFloor; //TODO: not save in DB

    /** @var int */
    private $floorsTravelled; //TODO not save in DB

    /** @var Collection */
    private $calls;

    public static function create(UuidInterface $uuid): Elevator
    {
        return new self($uuid);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function currentFloor(): int
    {
        return $this->currentFloor;
    }

    public function floorsTravelled(): int
    {
        return $this->floorsTravelled;
    }

    public function moveToFloor(int $floor): void
    {
        $this->currentFloor = $floor;
    }

    public function increaseFloorTrips(int $tripLength): void
    {
        $this->floorsTravelled += $tripLength;
    }

    public function getAggregateRootId(): string
    {
        return $this->uuid;
    }

    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
        $this->currentFloor = self::INITIAL_FLOOR;
        $this->floorsTravelled = 0;

        $this->calls = new ArrayCollection();
    }
}
