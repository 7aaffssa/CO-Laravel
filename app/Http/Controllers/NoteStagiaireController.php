<?php

namespace App\Http\Controllers;

use App\Models\NoteStagiaire;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class NoteStagiaireController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $notes = NoteStagiaire::with('stagiaire')
            ->when($search, function ($query, $search) {
                return $query->where('note', 'like', "%$search%")
                    ->orWhereHas('stagiaire', function ($query) use ($search) {
                        $query->where('nom', 'like', "%$search%")
                              ->orWhere('prenom', 'like', "%$search%");
                    });
            })->paginate(10);
        
        return view('notes.index', compact('notes', 'search'));
    }

    public function create()
    {
        $stagiaires = Stagiaire::all();
        return view('notes.create', compact('stagiaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required',
            'idS' => 'required|exists:stagiaires,idS',
        ]);

        NoteStagiaire::create($request->all());

        return redirect()->route('notes.index')
                       ->with('success', 'Note created successfully.');
    }

    public function edit(NoteStagiaire $note)
    {
        $stagiaires = Stagiaire::all();
        return view('notes.edit', compact('note', 'stagiaires'));
    }

    public function update(Request $request, NoteStagiaire $note)
    {
        $request->validate([
            'note' => 'required',
            'idS' => 'required|exists:stagiaires,idS',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')
                       ->with('success', 'Note updated successfully');
    }

    public function destroy(NoteStagiaire $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
                       ->with('success', 'Note deleted successfully');
    }
}