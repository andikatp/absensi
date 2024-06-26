<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //index
    public function index(Request $request)
    {
        // notes by user id
        $notes = Note::where('user_id', $request->user()->id)->get();
        return response()->json(['notes' => $notes], 200);
    }

    // create
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'note' => 'required'
        ]);

        $note = new Note();
        $note->user_id = $request->user()->id;
        $note->title = $request->title;
        $note->note = $request->note;
        $note->save();

        return response()->json(['message' => 'Note created successfully', 'note' => $note], 201);
    }
}
