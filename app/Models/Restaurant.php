<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'location', 'cost'];

    public function menuItems()
    {
        return $this->hasMany(Menu::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}