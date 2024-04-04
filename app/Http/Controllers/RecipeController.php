<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = \App\Models\Recipe::all();

        return view('recipe');
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
        // $recipes = \App\Models\Recipe::all(); //get all recipes
        $recipes = \App\Models\Recipe::latest()->take(3)->get();
        return view('welcome',array('recipes' => $recipes));
    }

    public function show($id)
    {
        $recipe = \App\Models\Recipe::find($id);
        $recipes = \App\Models\Recipe::latest()->take(3)->get();
        return view('recipe', ['recipe' => $recipe, 'recipes' => $recipes]);
    }

}
?>

