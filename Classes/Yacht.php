<?php
namespace Classes;
use Classes\Ship\Ship;

class Yacht extends Ship
{
    private $fuelConsumeRate;
    private $totalPassenger = 0;

    public function __construct(
        $name,
        $length,
        $width,
        $height,
        $weight,
        $maxSpeed,
        $fuelCapacity,
        $fuelConsumeRate,
        $fuelPercentage = 0,
    ) {
        parent::__construct($name, $length, $width, $height, $weight, $maxSpeed, $fuelPercentage, $fuelCapacity);

        $this->fuelConsumeRate = $fuelConsumeRate;
    }

    public function getSize(): float
    {
        return $this->length * $this->width * $this->height;
    }

    protected function powerAcceleration(): void
    {
        $this->currentSpeed += 150;
    }

    protected function fuelConsumption(int $range): void
    {
        if($this->fuelNotEmpty()) {
            $consumption = $this->fuelConsumeRate * ($range / $this->currentSpeed) * 0.2;
            $currentFuel = $this->getFuel() - $consumption;
            $this->setFuelLevel((int)($currentFuel / $this->fuelCapacity * 100));
            return;
        }
        throw new \Exception('Out of fuel');
    }

    /**
     * Add passenger number in yacht
     * @param int $totalPassenger
     */
    public function addPassenger(int $totalPassenger): void
    {
        $this->totalPassenger = $totalPassenger;
    }

    /**
     * Get total passenger
     */
    public function getPassenger(): int
    {
        return $this->totalPassenger;
    }

    protected function sail(int $range): void
    {
        $this->fuelConsumption($range);
    }

}