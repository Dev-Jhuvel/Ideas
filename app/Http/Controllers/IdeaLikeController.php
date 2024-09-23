<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $liker = Auth::user();
        $liker->likes()->attach($idea->id);

        return redirect()->route('dashboard')->with('success', 'Liked Succesfully!');
    }

    public function unlike(Idea $idea)
    {
        $liker = Auth::user();
        $liker->likes()->detach($idea);

        return redirect()->route('dashboard')->with('success', 'Liked Succesfully!');
    }
}
