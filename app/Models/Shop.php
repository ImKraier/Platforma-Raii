<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'Shop_Products';

    protected $fillable = [
        'title',
        'description',
        'image',
        'product_key',
        'price'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m',
        'updated_at' => 'datetime:Y-m-d H:m',
    ];
}
