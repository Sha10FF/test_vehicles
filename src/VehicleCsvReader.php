<?php

class VehicleCsvReader implements VehicleProvider
{

    public function __construct(private VehiclesFactoryInterface $factory, private string $file,)
    {
    }

    public function getCarList(): array
    {
        $result = [];
        if (($handle = fopen($this->file, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                try {
                    if ($c = $this->factory->create(...$data)) {
                        $result[] = $c;
                    }
                } catch (\Vehicles\Exception\CreateException $e) {
                    ;
                }
            }
            fclose($handle);
        }
        return $result;
    }
}