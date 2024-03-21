<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;
    protected $table = 'measurements';

    protected $fillable = [
        'client_id',
        'weight_kg',
        'fat_percentage',
        'blood_pressure',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
