<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Details extends Model
{
    use HasFactory;
    protected $fillable = [
        'quotation_id',
        'part_number_id',
        'description',
        'width',
        'length',
        'quantity',
        'factor',
        'laser',
        'custom_laser_price',
        'holes',
        'welding',
        'press',
        'saw',
        'drill',
        'clean',
        'paint',
        'pipe_thread',
        'pipe_engage',
        'press_setup',
        'total',
    ];

    protected $casts = [
      'holes' => 'array',
    ];

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }

    public function partNumber(): BelongsTo
    {
        return $this->belongsTo(PartNumber::class);
    }
}
