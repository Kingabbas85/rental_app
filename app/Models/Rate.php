<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
   use HasFactory;

    // e.g., type: electricity, water, gas, etc.
    protected $fillable = ['type', 'rate_per_unit'];
    public function bills() {
        return $this->hasMany(ElectricityBill::class);
    }

    public function waterbills() {
        return $this->hasMany(WaterBill::class);
    }
}
