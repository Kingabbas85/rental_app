<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ElectricityBill extends Model
{
   use HasFactory;
    protected $fillable = [
        'tenant_id', 'type', 'month', 'year', 'unit_consumed', 'total_amount', 'due_date', 'status'
    ];

     public function tenant() {
        return $this->belongsTo(Tenant::class);
    }
    public function ledger() {
        return $this->belongsTo(Ledger::class);
    }
    public function rate() {
        return $this->belongsTo(Rate::class);
    }
}
