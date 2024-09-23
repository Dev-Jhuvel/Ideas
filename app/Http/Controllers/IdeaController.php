<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = Auth::user()->id;

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created sucessfully!');
    }

    public function show(Idea $idea)
    {

        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if (Auth::user()->id !== $idea->user_id) {
            abort(404);
        }

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }
    public function update(Idea $idea)
    {
        if (Auth::user()->id !== $idea->user_id) {
            abort(404);
        }

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);
        $validated['user_id'] = Auth::user()->id;
        $idea = Idea::create($validated);

        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea Updated sucessfully!');
    }

    public function destroy(Idea $idea)
    {
        if (Auth::user()->id !== $idea->user_id) {
            abort(404);
        }

        $idea->delete();
        return redirect()->route('dashboard')->with('destroy', 'Idea Deleted sucessfully!');
    }
}
