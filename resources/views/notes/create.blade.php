@extends('app')

@section('content')
<div class="container">
    <h1>Add Note @isset($stagiaire) for {{ $stagiaire->nom }} {{ $stagiaire->prenom }} @endisset</h1>
    
    <form action="@isset($stagiaire) {{ route('stagiaires.store-note', $stagiaire->idU) }} @else {{ route('notes.store') }} @endisset" method="POST">
        @csrf
        <div class="mb-3">
            <label for="matiere" class="form-label">Subject</label>
            <input type="text" class="form-control" id="matiere" name="matiere" required>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <input type="number" step="0.01" class="form-control" id="note" name="note" min="0" max="20" required>
        </div>
        @empty($stagiaire)
        <div class="mb-3">
            <label for="idU" class="form-label">Stagiaire</label>
            <select class="form-select" id="idU" name="idU" required>
                <option value="">Select Stagiaire</option>
                @foreach($stagiaires as $s)
                    <option value="{{ $s->idU }}">{{ $s->nom }} {{ $s->prenom }}</option>
                @endforeach
            </select>
        </div>
        @endempty
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="@isset($stagiaire) {{ route('stagiaires.show', $stagiaire->idU) }} @else {{ route('notes.index') }} @endisset" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection