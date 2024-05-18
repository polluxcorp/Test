<?php

namespace App\Internal;

use JsonSerializable;

class PriceLineCalculations implements JsonSerializable
{
    public readonly float $amountTotal;

    public function __construct(
        public readonly float $perimeter,
        public readonly float $perimeters,
        public readonly float $laserLength,
        public readonly float $amountMaterial,
        public readonly float $factor,
        public readonly float $amountLaser,
        public readonly float $customLaser,
        public readonly float $amountWeld,
        public readonly float $amountPress,
        public readonly float $amountSaw,
        public readonly float $amountDrilling,
        public readonly float $amountCleaning,
        public readonly float $amountPainting,
        public readonly float $amountPipeThread,
        public readonly float $amountPipeEngage,
        public readonly float $amountPressSetUp,
    ) {
        $this->amountTotal = array_sum([
            $this->factor,
            $this->amountMaterial,
            $this->amountLaser,
            $this->amountWeld,
            $this->amountPress,
            $this->amountSaw,
            $this->amountDrilling,
            $this->amountCleaning,
            $this->amountPainting,
            $this->amountPipeThread,
            $this->amountPipeEngage,
            $this->amountPressSetUp,
        ]);
    }

    public static function empty(): self
    {
        return new self(0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    }

    /** @return array<string, scalar> */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
