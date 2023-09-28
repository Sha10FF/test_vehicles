<?php

interface VehiclesFactoryInterface
{
    public function create(?string ...$args): ?\Vehicles\BaseCar;
}