<?php
require_once 'vendor/autoload.php';

$f = new VehiclesFactory(\Vehicles\Car::class, \Vehicles\Truck::class, \Vehicles\SpecMachine::class);
$r = new VehicleCsvReader($f, "data/vehicles.csv");
var_dump($r->getCarList());