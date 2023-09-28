<?php

interface VehicleProvider
{
    /**
     * @return \Vehicles\BaseCar[]
     */
public function getCarList(): array;

}