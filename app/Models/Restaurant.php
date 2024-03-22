<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'address',
        'p_iva',
        'main_image',
    ];

    //molti a 1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
