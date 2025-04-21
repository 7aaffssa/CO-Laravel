<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index(Request $request)
    {
        $query = Produit::with('categorie');

        if ($request->has('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }

        $produits = $query->paginate(10);

        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'idC' => 'required|exists:categories,idC',
        ]);

        Produit::create($request->all());
        return redirect()->route('produits.index');
    }

    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('produits.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'idC' => 'required|exists:categories,idC',
        ]);

        $produit->update($request->all());
        return redirect()->route('produits.index');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index');
    }
}