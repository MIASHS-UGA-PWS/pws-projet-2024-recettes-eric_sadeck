<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Rating;


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

// Get the user roles
public function roles()
{
    return $this->belongsToMany(Role::class);
}

// Get the user role names
public function getRoleNamesAttribute()
{
    return $this->roles->pluck('name')->join(', ');
}

// Check if user has a role
public function hasRole($roleName)
{
    return $this->roles->contains('name', $roleName);
}

// Check if user is admin
public function isAdmin()
{
    return $this->roles->contains('name', 'admin');
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
