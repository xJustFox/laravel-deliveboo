<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_id',
        'restaurant_id',
        'name',
        'slug',
        'description',
        'price',
        'description',
        'visible',
        'image'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
