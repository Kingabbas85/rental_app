<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentalAgreement extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id', 'start_date', 'end_date', 'rent_amount', 'status', 'document_path'
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }
}
