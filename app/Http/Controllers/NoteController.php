<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    // index function to return all notes
    public function index()
    {
        $user = auth()->user();
        $notes = Note::all();
        return view('notes.index', compact('user', 'notes'));
    }

    // function to return the form to create a new note
    public function create()
    {
        $user = auth()->user();
        return view('notes.create', compact('user'));
    }

    // POST function to create a new note
    public function store(Request $request)
    {
        $note = new Note();
        $note->title = $request->title;
        $note->uuid = Str::uuid();
        $note->body = $request->body;
        $note->user_id = auth()->user()->id;
        $note->save();
        
        // redirect user to notes index
        return redirect()->route('notes.index');
    }

    // function to delete a note
    public function destroy(Note $note)
    {

        //@todo update with gates and policies
        if ( $note->user_id != Auth::id()) {
            abort(403);
        }

        $note->delete();
        return redirect()->route('notes.index');
    }

    // function to view a note
    public function show(Note $note)
    {

        //@todo update with gates and policies
        if ( $note->user_id != Auth::id()) {
            abort(403);
        }

        return view('single', compact('note'));
    }

    // function to edit a note
    public function edit(Note $note)
    {

        //@todo update with gates and policies
        if ( $note->user_id != Auth::id()) {
            abort(403);
        }

        return view('edit', compact('note'));
    }

    // function to update a note
    public function update(Request $request, Note $note)
    {

        //@todo update with gates and policies
        if ( $note->user_id != Auth::id()) {
            abort(403);
        }

        $note->title = $request->title;
        $note->body = $request->body;
        $note->save();

        //redirect to single of note
        return redirect()->route('notes.show', $note);
    }
}
