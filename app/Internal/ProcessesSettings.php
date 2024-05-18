<?php

namespace App\Internal;

class ProcessesSettings
{
    /** @param array<string, array{name: string, units: string, price: float, notes: string}> $data */
    public function __construct(private readonly array $data)
    {
    }

    private function getPrice(string $key): float
    {
        return $this->data[$key]['price'];
    }

    public function getLaser(float $customPrice = 0.001): float
    {
        if ($customPrice > 0.001) {
            return $customPrice;
        }
        return $this->getPrice('laser');
    }

    public function getWeld(): float
    {
        return $this->getPrice('weld');
    }

    public function getPress(): float
    {
        return $this->getPrice('press');
    }

    public function getSaw(): float
    {
        return $this->getPrice('saw');
    }

    public function getDrilling(): float
    {
        return $this->getPrice('drilling');
    }

    public function getCleaning(): float
    {
        return $this->getPrice('cleaning');
    }

    public function getPainting(): float
    {
        return $this->getPrice('painting');
    }

    public function getPipeThread(): float
    {
        return $this->getPrice('pipe_thread');
    }

    public function getPipeEngage(): float
    {
        return $this->getPrice('pipe_engage');
    }

    public function getPressSetUp(): float
    {
        return $this->getPrice('press_setup');
    }
}
