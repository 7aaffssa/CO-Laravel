@extends('app')

@section('content')
<div class="container">
    <h1>Notes</h1>
    
    <div class="mb-3">
        <form action="{{ route('notes.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by note or stagiaire..." name="search" value="{{ $search }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    
    <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">Add Note</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Note</th>
                <th>Stagiaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->id }}</td>
                <td>{{ $note->note }}</td>
                <td>{{ $note->stagiaire->nom }} {{ $note->stagiaire->prenom }}</td>
                <td>
                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $notes->appends(['search' => $search])->links() }}
</div>
@endsection