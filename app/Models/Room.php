<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['building_id','floor_id', 'room_number', 'room_type', 'rent_amount'];

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class);
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function tenants(): HasMany
    {
        return $this->hasMany(Tenant::class);
    }

    public function rentalAgreement() {
        return $this->hasOne(RentalAgreement::class);
    }
}
