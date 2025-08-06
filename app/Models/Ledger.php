<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ledger extends Model
{
     protected $fillable = ['name', 'address', 'floors'];
    public function tenant() {
        return $this->belongsTo(Tenant::class);
    }
    public function bills() {
        return $this->hasMany(ElectricityBill::class);
    }

    public function waterbills() {
        return $this->hasMany(WaterBill::class);
    }
    public function payments() {
        return $this->hasMany(Payment::class);
    }
    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
