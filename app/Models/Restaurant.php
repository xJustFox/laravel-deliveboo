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

    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }
}
