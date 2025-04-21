@extends('app')

@section('content')
<div class="container">
    <h1>Stagiaire Details</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h5>
            <p class="card-text">
                <strong>Age:</strong> {{ $stagiaire->age }}<br>
                <strong>Date of Birth:</strong> {{ $stagiaire->date_naissance->format('d/m/Y') }}
            </p>
            <a href="{{ route('stagiaires.edit', $stagiaire->idU) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('stagiaires.create-note', $stagiaire->idU) }}" class="btn btn-success">Add Note</a>
        </div>
    </div>

    <h2>Notes</h2>
    @if($notes->isEmpty())
        <p>No notes found for this stagiaire.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                <tr>
                    <td>{{ $note->matiere }}</td>
                    <td>{{ $note->note }}</td>
                    <td>
                        <a href="{{ route('notes.edit', $note->idN) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('notes.destroy', $note->idN) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $notes->links() }}
    @endif

    <a href="{{ route('stagiaires.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection