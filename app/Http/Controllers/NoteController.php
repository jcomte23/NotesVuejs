<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $notes=Note::latest()
            ->where('excerpt','LIKE',"%$request->q%")
            ->get();
        return Inertia::render('Notes/index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Notes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'excerpt'=>'required',
            'content'=>'required'
        ]);

        Note::create($request->all());

        return redirect()->route('notes.index')->with('status','Nota guardada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return Inertia::render('Notes/edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'excerpt'=>'required',
            'content'=>'required'
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')->with('status','Nota actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('status','Nota eliminada');
    }
}
