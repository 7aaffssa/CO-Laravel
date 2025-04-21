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
    <h1>🌸 Liste des Produits</h1>
    
    <form method="GET" action="{{ route('produits.index') }}" class="search-box">
        <input type="text" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
        <button class="btn">Rechercher</button>
    </form>
    
    <a href="{{ route('produits.create') }}" class="btn">+ Ajouter Produit</a>
    
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
            <tr>
                <td>{{ $produit->nom }}</td>
                <td>{{ $produit->prix }} €</td>
                <td>{{ $produit->categorie->nom }}</td>
                <td>
                    <a href="{{ route('produits.edit', $produit) }}" class="btn btn-warning">Modifier</a>
                    <form method="POST" action="{{ route('produits.destroy', $produit) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
{{ $produits->links('vendor.pagination.default') }}

    @endsection
    

</body>
</html>