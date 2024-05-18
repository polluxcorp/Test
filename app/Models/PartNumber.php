<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'sheetname',
        'partnumber',
        'description',
        'unitmeasure',
        'price',
        'weight',
        'width',
        'length',
    ];

    public function getArea(): int
    {
        return $this->width * $this->length;
    }

    public function getPricePerSquareInch(): float
    {
        if ($this->width < 0.001 || $this->length < 0.001 || $this->weight < 0.001) {
            return 0.0;
        }
        return $this->price / ($this->width * $this->length / $this->weight);
    }

    public function isUnitOfMeasurePounds(): bool
    {
        return 0 === strcasecmp(strval($this->unitmeasure), 'pounds');
    }

    public function getEffectivePrice(): float
    {
        // if is not pounds
        if ($this->isUnitOfMeasurePounds()) {
            return $this->getPricePerSquareInch();
        }

        return $this->price;
    }

    public function getPricePerUnit(): float
    {
        //if is units
        return $this->price;
    }
}
