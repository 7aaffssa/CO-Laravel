<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\NoteStagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $stagiaires = Stagiaire::when($search, function ($query, $search) {
            return $query->where('nom', 'like', "%$search%")
                       ->orWhere('prenom', 'like', "%$search%");
        })->paginate(10);
        
        return view('stagiaires.index', compact('stagiaires', 'search'));
    }

    public function create()
    {
        return view('stagiaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required|integer|min:15|max:99',
            'date_naissance' => 'required|date',
        ]);

        Stagiaire::create($request->all());

        return redirect()->route('stagiaires.index')
                       ->with('success', 'Stagiaire created successfully.');
    }

    public function show(Stagiaire $stagiaire)
    {
        $notes = $stagiaire->notes()->paginate(5);
        return view('stagiaires.show', compact('stagiaire', 'notes'));
    }

    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaires.edit', compact('stagiaire'));
    }

    public function update(Request $request, Stagiaire $stagiaire)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required|integer|min:15|max:99',
            'date_naissance' => 'required|date',
        ]);

        $stagiaire->update($request->all());

        return redirect()->route('stagiaires.index')
                       ->with('success', 'Stagiaire updated successfully');
    }

    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();

        return redirect()->route('stagiaires.index')
                       ->with('success', 'Stagiaire deleted successfully');
    }

    public function createNote(Stagiaire $stagiaire)
    {
        return view('notes.create', compact('stagiaire'));
    }

    public function storeNote(Request $request, Stagiaire $stagiaire)
    {
        $request->validate([
            'note' => 'required',
        ]);

        $note = new NoteStagiaire(['note' => $request->note]);
        $stagiaire->notes()->save($note);

        return redirect()->route('stagiaires.show', $stagiaire->idS)
                       ->with('success', 'Note added successfully.');
    }
}