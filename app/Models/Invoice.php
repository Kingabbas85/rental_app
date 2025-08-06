<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    //  protected $fillable = ['month', 'total_amount', 'pdf_path',''];

     public function tenant() {
        return $this->belongsTo(Tenant::class);
    }
    public function ledger() {
        return $this->belongsTo(Ledger::class);
    }
}
