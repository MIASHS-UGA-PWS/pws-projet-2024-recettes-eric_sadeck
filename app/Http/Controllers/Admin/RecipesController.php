<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RecipesController extends Controller

{
    protected $user;
    protected $userId;
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');

         $this->middleware(function ($request, $next) {
             $this->user = Auth::user();
             $this->userId = Auth::id();

             return $next($request);
         });
     }

    public function index()
    {
        // $recipes = Recipe::all();
        $recipes = \App\Models\Recipe::latest()->get(); // get all recipes in descending order
        return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'ingredients' => 'required',
        'price' => 'required',
    ]);

    $recipe = new Recipe;
    // $recipe->owner_id = auth()->id();
    $recipe->owner_id = $this->userId;
    $recipe->title = $request->title;
    $recipe->content = $request->content;
    $recipe->ingredients = $request->ingredients;
    $recipe->price = $request->price;
    $recipe->url = str_replace(' ', '-', $request->title);
    $recipe->tags = 'default-tag'; // replace with actual tags if needed
    $recipe->status = 'published';

    $recipe->save();

    // return redirect()->route('recipes.index');
        return redirect()->route('recipes.show', $recipe);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('admin.recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $recipe->update($request->all());
        return redirect()->route('recipes.show', $recipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}
