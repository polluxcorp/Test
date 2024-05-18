<?php

namespace App\Internal;

class Holes
{
    public readonly float $totalLengthHoles;
    /** @var Hole[] */
    private array $holes;

    public function __construct(Hole ...$holes)
    {
        $this->holes = $holes;
        $this->totalLengthHoles = array_sum(array_column($this->holes, 'totalLength'));
    }

    public static function fromArrayValues(array $diameters, array $quantities): self
    {
        $values = [];
        foreach ($diameters as $index => $value) {
            $values[$index] = ['diameter' => floatval($value), 'quantity' => intval($quantities[$index])];
        }

        return new Holes(...array_map(
            fn (array $values): Hole => new Hole($values['diameter'], $values['quantity']),
            $values
        ));
    }
}
