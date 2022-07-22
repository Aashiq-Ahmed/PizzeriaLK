<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
        'description',
        'pizza_size',
        'is_available',
        'price',
        'image',
    ];

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
