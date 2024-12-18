<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'measurement_unit'];

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'ingredient_id');
    }
    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'recipes')->withPivot('amount');
    }

}
