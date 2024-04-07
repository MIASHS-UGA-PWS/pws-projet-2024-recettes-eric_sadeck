<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Rating;
use App\Models\User; 
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the user recipes'
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class,'owner_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function store(Request $request, $recipe)
{
    $anonymousUser = $this->firstOrCreate(['email' => 'anonymous@user.com']);
    
    $rating = new Rating;
    $rating->recipe_id = $recipe;
    $rating->stars = $request->score;
    $rating->user_id = $anonymousUser->id;
    $rating->save();

    return back();
}
}