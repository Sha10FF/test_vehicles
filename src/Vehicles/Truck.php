<?php

namespace Vehicles;

use Vehicles\Exception\CreateException;

class Truck extends BaseCar
{
    protected const _TYPE = 'truck';

    /**
     * @throws CreateException
     */
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
            $bodyWidth = 0.0;
            $bodyHeight = 0.0;
            $bodyLength = 0.0;
            if ($bodyWHL) {
                list($w, $h, $l) = explode('x', $bodyWHL, 3);
                if (!is_numeric($w)) {
                    throw new CreateException("Width can`t be '{$w}'");
                }
                $bodyWidth = floatval($w);

                if (!is_numeric($h)) {
                    throw new CreateException("Height can`t be '{$h}'");
                }
                $bodyHeight = floatval($h);

                if (!is_numeric($l)) {
                    throw new CreateException("Length can`t be '{$l}'");
                }
                $bodyLength = floatval($l);
            }
            return new self(
                $brand,
                floatval($carrying),
                $photoFileName,
                $bodyWidth,
                $bodyHeight,
                $bodyLength
            );
        }
        return null;
    }

    protected function __construct(
        string                $brand,
        float                 $carrying,
        string                $photoFileName,
        public readonly float $bodyWidth,
        public readonly float $bodyHeight,
        public readonly float $bodyLength,
    )
    {
        parent::__construct($brand, $carrying, $photoFileName);
    }

    /**
     * объем кузова в кубических метрах
     * @return float m³
     */
    public function getBodyVolume(): float
    {
        return $this->bodyWidth * $this->bodyHeight * $this->bodyHeight;
    }
}