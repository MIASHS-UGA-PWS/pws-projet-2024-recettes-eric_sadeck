<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;

class RecipeController extends Controller
{
    public function index()
    {
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

}
?>
