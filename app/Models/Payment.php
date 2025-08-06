<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id', 'amount', 'payment_date', 'payment_type', 'note', 'status'
    ];

   public function tenant() {
        return $this->belongsTo(Tenant::class);
    }
    public function ledger() {
        return $this->belongsTo(Ledger::class);
    }
}
