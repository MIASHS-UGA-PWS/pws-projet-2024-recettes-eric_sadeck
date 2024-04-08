<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
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
public function getRouteKeyName()
{
    return 'url';
}
public function ratings()
{
    return $this->hasMany('App\Models\Rating');
}
public function averageRating()
{
    return $this->ratings()->avg('stars');
}
public function comments()
{
    return $this->hasMany(Comment::class);
}
}
