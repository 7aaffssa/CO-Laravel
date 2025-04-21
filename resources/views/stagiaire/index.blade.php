@extends('app')

@section('content')
<div class="container">
    <h1>Stagiaires</h1>
    
    <div class="mb-3">
        <form action="{{ route('stagiaires.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ $search }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    
    <a href="{{ route('stagiaires.create') }}" class="btn btn-primary mb-3">Add Stagiaire</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Age</th>
                <th>Date Naissance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->idS }}</td>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->age }}</td>
                <td>{{ $stagiaire->date_naissance->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('stagiaires.show', $stagiaire->idS) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('stagiaires.edit', $stagiaire->idS) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('stagiaires.destroy', $stagiaire->idS) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $stagiaires->appends(['search' => $search])->links() }}
</div>
@endsection