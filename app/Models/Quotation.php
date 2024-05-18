<?php

namespace App\Models;

use App\Internal\Holes;
use App\Internal\PriceLineData;
use App\Internal\PriceQuotation;
use App\Internal\PartNumberPrice;
use App\Internal\ProcessesManager;
use App\Internal\ProcessesSettings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_id',
        'date',
        'description',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Details::class);
    }

    public function calculateTotalPrice(): float
    {
        $details = $this->details()->with('partnumber')->get();
        $lines = [];
        foreach ($details as $detail) {
            $partNumberPrice = new PartNumberPrice(
                $detail->partnumber->isUnitOfMeasurePounds(),
                $detail->partnumber->getPricePerSquareInch(),
                $detail->partnumber->getPricePerUnit(),
                floatval($detail->partnumber->price)
            );

            $lines[] = new PriceLineData(
                $detail->width,
                $detail->length,
                $detail->quantity,
                $detail->factor,
                $partNumberPrice,
                Holes::fromArrayValues([], []), // todo
                $detail->custom_laser_price,
                $detail->welding,
                $detail->press,
                $detail->saw,
                $detail->drill,
                $detail->clean,
                $detail->paint,
                $detail->pipe_thread,
                $detail->pipe_engage,
                $detail->press_setup,
            );
        }

        $processesManager = new ProcessesManager();
        $settings = $processesManager->settingsWithValues($this->toArray());
        $processesSettings = new ProcessesSettings($settings);

        $priceQuotation = new PriceQuotation($processesSettings, ...$lines);

        return $priceQuotation->amountTotal;
    }
}
