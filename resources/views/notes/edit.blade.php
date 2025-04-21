@extends('app')

@section('content')
<div class="container">
    <h1>Edit Note</h1>
    
    <form action="{{ route('notes.update', $note->idN) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="matiere" class="form-label">Subject</label>
            <input type="text" class="form-control" id="matiere" name="matiere" value="{{ $note->matiere }}" required>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <input type="number" step="0.01" class="form-control" id="note" name="note" value="{{ $note->note }}" min="0" max="20" required>
        </div>
        <div class="mb-3">
            <label for="idU" class="form-label">Stagiaire</label>
            <select class="form-select" id="idU" name="idU" required>
                @foreach($stagiaires as $s)
                    <option value="{{ $s->idU }}" {{ $note->idU == $s->idU ? 'selected' : '' }}>
                        {{ $s->nom }} {{ $s->prenom }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection