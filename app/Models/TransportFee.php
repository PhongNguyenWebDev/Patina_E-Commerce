<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportFee extends Model
{
    use HasFactory;
    protected $table = 'transport_fee';
    protected $fillable = [
        'name'
    ];

}
