<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('ratings')->get()->sortByDesc(function ($recipe) {
            return $recipe->averageRating();
        });
    
        return view('recipe', compact('recipes'));
    }

    public function showRecipeOwner()
    {
        $recipe = Recipe::find(1); // trouver la recette avec l'id 1
        echo $recipe->user->name; // affiche le nom du propriétaire
    }

    public function showUserRecipes()
    {
        $recipes = User::find(1)->recipes; // get recipes from user id 1
        foreach ($recipes as $recipe) {
            // loop on recipes
        }
    }

    public function welcome()
    {
        $recipes = Recipe::latest()->get(); // get all recipes in descending order
        return view('recipe', array('recipes' => $recipes));
    }

    public function show_id($id)
    {
        $recipe = Recipe::find($id);
        $recipes = Recipe::all(); //get all recipes
        return view('recipe', ['recipe' => $recipe, 'recipes' => $recipes]);
    }

    public function show($recipe_url)
    {
        $recipe = Recipe::where('url', $recipe_url)->first(); //get first recipe with recipe_nam == $recipe_name
        $recipe->load('comments'); // Load the comments of the recipe
        $recipes = Recipe::all(); //get all recipes

        return view('recipes/single', array( //Pass the recipe to the view
            'recipe' => $recipe,
            'recipes' => $recipes,
        ));
    }
}