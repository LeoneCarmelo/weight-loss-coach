<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Client;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = ['weight_kg', 'fat_percentage', 'blood_pressure', 'client_id'];

    public function client() : BelongsTo {
        return $this->belongsTo(Client::class);
    }
}
