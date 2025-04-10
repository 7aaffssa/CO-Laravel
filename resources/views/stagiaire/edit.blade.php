@extends('stagiaire.app')

@section('content')
    <div class="container">
        <h1>Modifier le module</h1>
        
        <form action="/stagiaire/{{ $module->code }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="code">Code</label>
                <input type="number" class="form-control" id="code" name="code" value="{{ $module->code }}" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="title">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $module->title }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="hours">Heures</label>
                <input type="number" class="form-control" id="hours" name="hours" value="{{ $module->hours }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="/stagiaire" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection