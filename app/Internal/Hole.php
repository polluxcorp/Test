<?php

namespace App\Internal;

class Hole
{
    public const PI = 3.1416;

    /** @var float The length of only one hole */
    public readonly float $holeLength;

    /** @var float The length of all the holes */
    public readonly float $totalLength;

    public function __construct(
        public readonly float $diameter,
        public readonly int $quantity,
    ) {

        $this->holeLength = round(self::PI * $diameter, 2);
        $this->totalLength = round(self::PI * $diameter * $quantity, 2);
    }
}
