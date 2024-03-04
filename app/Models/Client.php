<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Measurement;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'length_cm', 'email', 'photo'];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function measurements() : HasMany {
        return $this->hasMany(Measurement::class);
    }
}
