<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_id',
        'name',
        'code',
        'type',
        'value',
        'price_type',
        'price_value',
        'description',
        'delivery_method',
        'is_active',
    ];
}
