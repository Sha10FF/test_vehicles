<?php

namespace Vehicles;

class Car extends BaseCar
{
    protected const _TYPE = 'car';

    public static function create(
        ?string $type,
        ?string $brand,
        ?string $passengerSeatsCount,
        ?string $photoFileName,
        ?string $bodyWHL,
        ?string $carrying,
        ?string $extra,
    ): ?static
    {
        if (
            $type == self::_TYPE
            && is_numeric($carrying)
            && is_numeric($passengerSeatsCount)
        ) {
            return new self(
                $brand,
                floatval($carrying),
                $photoFileName,
                intval($passengerSeatsCount)
            );
        }
        return null;
    }

    protected function __construct(
        string              $brand,
        float               $carrying,
        string              $photoFileName,
        public readonly int $passengerSeatsCount,
    )
    {
        parent::__construct($brand, $carrying, $photoFileName);
    }

}