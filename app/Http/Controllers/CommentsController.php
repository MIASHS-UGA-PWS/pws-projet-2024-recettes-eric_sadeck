<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
{
    $recipeId = $request->route('recipe');
    $comment = new Comment;
    $comment->recipe_id = $recipeId;
    $comment->content = $request->content;
    $comment->save();

    return back();
}
}
//return redirect()->back()->with('success', 'Commentaire ajouté avec succès!');