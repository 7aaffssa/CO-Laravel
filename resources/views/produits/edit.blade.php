@extends('produits.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    @section('content')
    <h2>🛠️ Modifier Produit</h2>
    
    <form method="POST" action="{{ route('produits.update', $produit) }}">
        @csrf
        @method('PUT')
    
        <label>Nom</label>
        <input type="text" name="nom" value="{{ $produit->nom }}" required>
    
        <label>Prix (€)</label>
        <input type="number" step="0.01" name="prix" value="{{ $produit->prix }}" required>
    
        <label>Catégorie</label>
        <select name="idC">
            @foreach($categories as $categorie)
                <option value="{{ $categorie->idC }}" {{ $produit->idC == $categorie->idC ? 'selected' : '' }}>
                    {{ $categorie->nom }}
                </option>
            @endforeach
        </select>
    
        <button class="btn">Mettre à jour</button>
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour</a>
    </form>
    @endsection
    
</body>
</html>