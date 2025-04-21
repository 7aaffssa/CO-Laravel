@extends('app')

@section('content')
<div class="container">
    <h1>Note Details</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $note->matiere }}</h5>
            <p class="card-text">
                <strong>Note:</strong> {{ $note->note }}<br>
                <strong>Stagiaire:</strong> {{ $note->stagiaire->nom }} {{ $note->stagiaire->prenom }}
            </p>
            <a href="{{ route('notes.edit', $note->idN) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>

    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection