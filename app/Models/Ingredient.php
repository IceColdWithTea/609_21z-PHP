<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'unit'];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'recipes')->withPivot('quantity');
    }
}
