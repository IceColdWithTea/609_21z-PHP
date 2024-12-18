<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['dish_id', 'ingredient_id', 'amount'];

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }
}
