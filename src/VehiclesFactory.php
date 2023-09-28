<?php

final class VehiclesFactory implements VehiclesFactoryInterface
{

    private array $vehicles = [];

    public function __construct(string ...$cars)
    {
        foreach ($cars as $class) {
            if (is_a($class, \Vehicles\BaseCar::class, true)) {
                $this->vehicles[] = $class;
            }
        }
    }

    public function create(?string ...$args): ?\Vehicles\BaseCar
    {
        foreach ($this->vehicles as $class) {
            if ($vehicle = $class::create(...$args)) {
                return $vehicle;
            }
        }
        return null;
    }

}