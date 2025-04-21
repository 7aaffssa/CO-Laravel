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
    <h2>🍓 Ajouter un Produit</h2>
    
    <form method="POST" action="{{ route('produits.store') }}">
        @csrf
    
        <label>Nom</label>
        <input type="text" name="nom" required>
    
        <label>Prix (€)</label>
        <input type="number" name="prix" step="0.01" required>
    
        <label>Catégorie</label>
        <select name="idC">
            @foreach($categories as $categorie)
                <option value="{{ $categorie->idC }}">{{ $categorie->nom }}</option>
            @endforeach
        </select>
    
        <button class="btn">Enregistrer</button>
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
    @endsection
    

</body>
</html>