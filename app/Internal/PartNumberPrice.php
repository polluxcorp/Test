<?php

namespace App\Internal;

class PartNumberPrice
{
    public function __construct(
        public readonly bool $isPounds,
        public readonly float $pricePerSqInch,
        public readonly float $pricePerLb,
        public readonly float $pricePerUnit,
    )
    {
    }
}
