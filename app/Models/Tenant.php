<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'cnic',
        'password',
        'total_members',
        'move_in_date',
        'move_out_date',
        'security_deposit',
        'remaining_balance',
        'status'
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function rentalAgreements()
    {
        return $this->hasMany(RentalAgreement::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

   public function ledgers() {
        return $this->hasMany(Ledger::class);
    }
    public function bills() {
        return $this->hasMany(ElectricityBill::class);
    }

    public function waterbills() {
        return $this->hasMany(WaterBill::class);
    }
}
