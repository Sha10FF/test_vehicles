<?php

namespace Vehicles;

abstract class BaseCar
{
    protected const _TYPE = '';
    public readonly string $carType;

    abstract public static function create(
        ?string $type,
        ?string $brand,
        ?string $passengerSeatsCount,
        ?string $photoFileName,
        ?string $bodyWHL,
        ?string $carrying,
        ?string $extra,
    ): ?static;


    protected function __construct(
        public readonly string $brand,
        public readonly float  $carrying,
        public readonly string $photoFileName,
    )
    {
        $this->carType = static::_TYPE;
    }

    public function getPhotoFileExt(): ?string
    {
        $dot = strrpos($this->photoFileName, '.');
        if ($dot === false) {
            return null;
        }
        return substr($this->photoFileName, $dot);
    }
}