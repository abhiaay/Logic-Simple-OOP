<?php
namespace Classes\Ship;

use Classes\Ship\Engine;

abstract class Ship extends Engine
{
    public function __construct(
        protected string $name,
        protected float $length,
        protected float $width,
        protected float $height,
        protected float $weight,
        protected int $maxSpeed,
        protected int $fuelPercentage,
        protected float $fuelCapacity,
        protected bool $isSailing = false,
        protected int $distance = 0,
    ){
        parent::__construct($maxSpeed, $fuelPercentage, $fuelCapacity);
    }

    /**
     * Get size of ship
     * 
     * @return float size of ship
     */
    abstract public function getSize(): float;

    /**
     * How sail to be process fuel consume, etc
     * 
     * @throws Exception if something happen while sailing
     */
    abstract protected function sail(int $range): void;

    /**
     * Sail to the given range in km
     * @param int $range in km
     * @return bool return true if sailing to given range can be reach
     */
    public function sailing(int $range): bool
    {
        $this->isSailing = true;
        $this->distance = 0;
        while($this->engineStart && $this->distance < $range) {
            $this->sail($range);
            $this->distance += $this->currentSpeed;
        }
        $this->isSailing = false;
        return true;
    }

    /**
     * Get name of ship
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get distance ship sail from start
     */
    public function getDistanceSail(): int
    {
        return $this->distance;
    }
}