<?php

namespace App\Internal;

class PriceQuotation
{
    /** @var PriceLineData[] */
    private readonly array $lines;

    /** @var array PriceLineCalculations[] */
    private readonly array $calculations;
    public readonly float $amountTotal;

    public function __construct(
        public readonly ProcessesSettings $processes,
        PriceLineData ...$lines
    ) {
        $this->lines = $lines;

        if (count($this->lines) > 0) {
            $this->calculations = array_map(
                fn (PriceLineData $line): PriceLineCalculations => $this->calculateLine($line),
                $this->lines
            );

            $this->amountTotal = array_sum(array_column($this->calculations, 'amountTotal'));
        } else {
            $this->calculations = [];
            $this->amountTotal = 0.00;
        }
    }


    public function calculateLine(PriceLineData $line): PriceLineCalculations
    {
        $factor = ($line->factor !== null && $line->partNumberPrice->pricePerUnit !== null) ? $line->factor * $line->partNumberPrice->pricePerUnit * $line->quantity : 0;

        if (!$factor) {
            $factor = 0;
        } else {
            if ($line->factor !== null && $line->partNumberPrice->pricePerUnit !== null) {
                $factor = $line->factor * $line->partNumberPrice->pricePerUnit * $line->quantity;
            } else {
                $factor = 0;
            }
        }
        if ($line->partNumberPrice->isPounds) {
            $amountMaterial = $line->width * $line->length * $line->quantity * $line->partNumberPrice->pricePerSqInch;
        }
        elseif ($line->partNumberPrice->pricePerUnit) {
            $amountMaterial= $line->quantity * $line->partNumberPrice->pricePerUnit;
        }


        $perimeter = 2 * $line->width + 2 * $line->length;
        $perimeters = $perimeter * $line->quantity;
        $laserLength = $perimeters + $line->holes->totalLengthHoles;

        if ($line->customLaserPrice > 0) {
            $laserAmount = $line->customLaserPrice * $line->quantity; // Solo multiplicar customLaserPrice por quantity
        } else {
            $laserAmount = $this->processes->getLaser() * $laserLength;
        }


        return new PriceLineCalculations(
            $perimeter,
            $perimeters,
            $laserLength,
            $amountMaterial,
            $factor,
            $laserAmount, // Pasar el monto ajustado del láser aquí
            $this->processes->getLaser(0.0) * $laserLength,
            $this->processes->getWeld() * $line->quantity * $line->weld,
            $this->processes->getPress() * $line->quantity * $line->press,
            $this->processes->getSaw() * $line->quantity * $line->saw,
            $this->processes->getDrilling() * $line->quantity * $line->drilling,
            $this->processes->getCleaning() * $line->cleaning,
            $this->processes->getPainting() * $line->painting,
            $this->processes->getPipeThread() * $line->quantity * $line->pipeThread,
            $this->processes->getPipeEngage() * $line->quantity * $line->pipeEngage,
            $this->processes->getPressSetUp() * $line->pressSetUp,
        );
    }
}
