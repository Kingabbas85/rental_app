<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterBill extends Model
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
