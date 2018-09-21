<?php

namespace App\Http\Controllers;


use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {

    $notes = Note::all();

    return view('notes/index' , ['notes' => $notes]);

    }

    public function show(Note $note)
    {


    return view('notes/show' , ['note' => $note]);
    
    }

     public function create()
    {


    return view('notes/create');
    
    }

    public function store()
    {

        request()->validate([

            'title' => 'required',
            'body' => 'required|max:140',

        ]);

    	Note::create(request()->all());
    	//$note = new Note;
    	//$note->title = request()->title;
    	//$note->body = request()->body;
    	//$note->important = is_null(request()->important) ? 0 : 1;
    	//$note->save();

    	//return redirect('/notes');
    	return back();
    }

    public function edit(Note $note)
    {


    return view('notes/edit',compact('note'));
    
    }

      public function update(Note $note)
    {

         request()->validate([

            'title' => 'required',
            'body' => 'required|max:140',

        ]);

        $note->update(request()->all());

        return redirect('notes');
    
    
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('/notes');
    }

}
