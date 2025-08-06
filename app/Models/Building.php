<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'floors'];

    protected static bool $shouldSkipAuthorization = true;

    public function floors(): HasMany
    {
        return $this->hasMany(Floor::class);
    }
}
