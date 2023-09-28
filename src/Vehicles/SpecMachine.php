<?php

namespace Vehicles;

class SpecMachine extends BaseCar
{
    protected const _TYPE = 'specMachine';

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
        ) {
            return new self(
                $brand,
                floatval($carrying),
                $photoFileName,
                $extra
            );
        }
        return null;
    }

    protected function __construct(
        string                 $brand,
        float                  $carrying,
        string                 $photoFileName,
        public readonly string $extra,
    )
    {
        parent::__construct($brand, $carrying, $photoFileName);
    }
}