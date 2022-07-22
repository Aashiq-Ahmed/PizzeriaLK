<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'size_id',
        'name',
        'topping',
        'price',
        'is_available',
    ];

    public function sizes()
    {
        return $this->belongsTo(Size::class);
    }
}
