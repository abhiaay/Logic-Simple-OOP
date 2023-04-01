<?php

namespace Classes\Ship;

abstract class Engine
{
    public function __construct(
        protected int $maxSpeed, 
        protected int $fuelPercentage,
        protected float $fuelCapacity,
        protected int $currentSpeed = 0,
        protected bool $engineStart = false
    ){}

    /**
     * Engine acceleration
     * 
     * @return int $currentSpeed
     */
    abstract protected function powerAcceleration(): void;

    /**
     * Fuel consumption
     * @param int $range of destination in km
     */
    abstract protected function fuelConsumption(int $range): void;

    /**
     * Acceleartion the engine
     */
    public function acceleration(): void
    {
        if($this->currentSpeed <= $this->maxSpeed) {
            $this->powerAcceleration();
        } else {
            $this->currentSpeed = $this->maxSpeed;
        }
    }

    /**
     * Start the engine
     */
    public function engineOn(): void
    {
        $this->engineStart = true;
    }

    /**
     * Turn of the engine
     */
    public function engineOff(): void
    {
        $this->engineStart = false;
    }

    /**
     * Fill fuel level
     */
    public function fillFuel(): void
    {
        $this->fuelPercentage = 100;
    }

    /**
     * Set fuel based on given fuel
     * @param int $fuel
     */
    public function setFuelLevel(int $fuel): void
    {
        $this->fuelPercentage = $fuel;
    }

    /**
     * Get fuel percentage
     */
    public function getFuelPercentage(): int
    {
        return $this->fuelPercentage;
    }

    public function getFuel(): float
    {
        return ($this->fuelCapacity * $this->fuelPercentage) / 100;
    }

    /**
     * Check if fuel is not empty
     */
    public function fuelNotEmpty(): bool
    {
        return $this->getFuelPercentage() >= 5;
    }
}