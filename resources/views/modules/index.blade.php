@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Module Management</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('modules.index') }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Search module..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Modules List</h5>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModuleModal">
                Add New Module
            </button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Hours</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($modules as $module)
                        <tr>
                            <td>{{ $module->codeM }}</td>
                            <td>{{ $module->titre }}</td>
                            <td>{{ $module->masse_horaire }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn" 
                                        data-code="{{ $module->codeM }}"
                                        data-titre="{{ $module->titre }}"
                                        data-masse="{{ $module->masse_horaire }}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModuleModal">
                                    Edit
                                </button>
                                <form action="{{ route('modules.destroy', $module->codeM) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No modules found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="showing-info">
                    Showing {{ $showAll ? $totalModules : min(4, $totalModules) }} of {{ $totalModules }} results
                </div>
                
                @if($totalModules > 4)
                    <div class="show-all-section">
                        @if(!$showAll)
                            <a href="{{ route('modules.index', array_merge(request()->except('page'), ['show_all' => true])) }}" 
                               class="btn btn-outline-primary">
                               Show All
                            </a>
                        @else
                            <a href="{{ route('modules.index', request()->except(['show_all', 'page'])) }}" 
                               class="btn btn-outline-secondary">
                               Show Less
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            <div class="mt-3 text-center">
                <form action="{{ route('modules.destroyAll') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ALL modules?')">
                        Delete All Modules
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Module Modal -->
<div class="modal fade" id="addModuleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('modules.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Add New Module</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="codeM" class="form-label">Module Code</label>
                        <input type="text" class="form-control" id="codeM" name="codeM" required>
                    </div>
                    <div class="mb-3">
                        <label for="titre" class="form-label">Title</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="mb-3">
                        <label for="masse_horaire" class="form-label">Hours</label>
                        <input type="number" class="form-control" id="masse_horaire" name="masse_horaire" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Module</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Module Modal -->
<div class="modal fade" id="editModuleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Edit Module</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_codeM" class="form-label">Module Code</label>
                        <input type="text" class="form-control" id="edit_codeM" name="codeM" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="edit_titre" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_titre" name="titre" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_masse_horaire" class="form-label">Hours</label>
                        <input type="number" class="form-control" id="edit_masse_horaire" name="masse_horaire" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning text-white">Update Module</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .showing-info {
        font-size: 0.9rem;
        color: #6c757d;
    }
    .show-all-section {
        margin-left: auto;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-outline-primary, .btn-outline-secondary {
        border-width: 2px;
    }
    .action-buttons .btn {
        margin-right: 5px;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const code = this.getAttribute('data-code');
            const titre = this.getAttribute('data-titre');
            const masse = this.getAttribute('data-masse');
            
            document.getElementById('edit_codeM').value = code;
            document.getElementById('edit_titre').value = titre;
            document.getElementById('edit_masse_horaire').value = masse;
            
            document.getElementById('editForm').action = `/modules/${code}`;
        });
    });
});
</script>
@endpush
@endsection