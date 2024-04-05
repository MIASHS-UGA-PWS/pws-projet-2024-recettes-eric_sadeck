<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    protected $fillable = ['title', 'content', 'price', 'ingredients'];

    use HasFactory;

/**
 * Get the user that owns the recipe.
 */
public function user()
{
    return $this->belongsTo(User::class,'owner_id');

}
}
