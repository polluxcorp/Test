<?php

namespace App\Internal;

class PriceLineData
{
    public function __construct(
        public readonly float             $width,
        public readonly float             $length,
        public readonly int               $quantity,
        public readonly float             $factor,
        public readonly PartNumberPrice   $partNumberPrice,
        public readonly Holes             $holes,
        public readonly float             $customLaserPrice,
        public readonly int               $weld,
        public readonly int               $press,
        public readonly int               $saw,
        public readonly int               $drilling,
        public readonly int               $cleaning,
        public readonly int               $painting,
        public readonly int               $pipeThread,
        public readonly int               $pipeEngage,
        public readonly int               $pressSetUp,
    ) {
    }
}
