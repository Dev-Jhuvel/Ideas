<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('idea.editAndDelete', $idea);

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }
    public function update(Idea $idea)
    {
        Gate::authorize('idea.editAndDelete', $idea);

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
        Gate::authorize('idea.editAndDelete', $idea);

        $idea->delete();
        return redirect()->route('dashboard')->with('destroy', 'Idea Deleted sucessfully!');
    }
}
