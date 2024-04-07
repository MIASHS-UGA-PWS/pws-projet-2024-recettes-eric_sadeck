<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
{
    $recipes = \App\Models\Recipe::with('ratings')->get()->each(function ($recipe) {
        $recipe->averageRating = $recipe->ratings()->avg('stars');
    })->sortByDesc('averageRating')->values()->take(3);

    return view('welcome', ['recipes' => $recipes]);
}
   

    public function index()
{
    $recipes = \App\Models\Recipe::with('ratings')->get()->each(function ($recipe) {
        $recipe->averageRating = $recipe->ratings()->avg('stars');
    })->sortByDesc('averageRating')->values();

    return view('home', compact('recipes'));
}
}
