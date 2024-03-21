<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'length_cm',
        'email',
        'photo',
    ];

    protected $table = 'clients';

    public function measurements()
    {
        return $this->hasMany(Measurement::class);
    }

}
