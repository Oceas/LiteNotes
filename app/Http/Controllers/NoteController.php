<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    // index function to return all notes
    public function index()
    {
        $user = auth()->user();
        $notes = Note::all();
        return view('notes', compact('user', 'notes'));
    }

    // POST function to create a new note
    public function store(Request $request)
    {
        $note = new Note();
        $note->title = $request->title;
        $note->body = $request->body;
        $note->user_id = auth()->user()->id;
        $note->save();
        
        // redirect user to notes index
        return redirect()->route('notes.index');
    }

    // function to delete a note
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }

    // function to view a note
    public function show(Note $note)
    {
        return view('single', compact('note'));
    }

    // function to edit a note
    public function edit(Note $note)
    {
        return view('edit', compact('note'));
    }

    // function to update a note
    public function update(Request $request, Note $note)
    {
        $note->title = $request->title;
        $note->body = $request->body;
        $note->save();

        //redirect to single of note
        return redirect()->route('notes.show', $note);
    }
}
