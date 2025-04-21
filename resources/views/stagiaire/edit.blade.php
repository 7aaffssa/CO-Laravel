@extends('app')

@section('content')
<div class="container">
    <h1>Edit Stagiaire</h1>
    
    <form action="{{ route('stagiaires.update', $stagiaire->idU) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $stagiaire->nom }}" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $stagiaire->prenom }}" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $stagiaire->age }}" required min="15" max="99">
        </div>
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $stagiaire->date_naissance->format('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('stagiaires.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection