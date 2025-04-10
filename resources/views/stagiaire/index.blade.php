@extends('stagiaire.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 text-primary">Code du module</h1>
                <h2 class="h4 text-muted">Masse Horaire</h2>
            </div>
            <a href="/stagiaire/create" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Ajouter un module
            </a>
        </div>
        
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-4">Code</th>
                                <th class="py-3 px-4">Titre</th>
                                <th class="py-3 px-4">Heures</th>
                                <th class="py-3 px-4 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stagiaire as $module)
                                <tr class="align-middle">
                                    <td class="px-4 fw-bold">{{ $module->code }}</td>
                                    <td class="px-4">{{ $module->title }}</td>
                                    <td class="px-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary">
                                            {{ $module->hours }}h
                                        </span>
                                    </td>
                                    <td class="px-4 text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="/stagiaire/{{ $module->code }}/edit" 
                                               class="btn btn-sm btn-outline-warning"
                                               data-bs-toggle="tooltip" 
                                               title="Modifier">
                                                <i class="fas fa-edit">Modifier</i>
                                            </a>
                                            <form action="/stagiaire/{{ $module->code }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="tooltip" 
                                                        title="Supprimer"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce module?')">
                                                    <i class="fas fa-trash-alt">Supprimer</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top">
                    <div class="text-muted small">
                        Affichage de {{ $stagiaire->firstItem() }} à {{ $stagiaire->lastItem() }} sur {{ $stagiaire->total() }} stagiaire
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0">
                            {{ $stagiaire->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .card {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.03);
        }
        
        .table thead th {
            border-bottom: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            color: #6c757d;
        }
        
        .btn-outline-warning {
            color: #ffc107;
            border-color: #ffc107;
        }
        
        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: #000;
        }
        
        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
        
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }
        
        .badge {
            padding: 0.35em 0.65em;
            font-weight: 500;
        }
        
        .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        
        .page-link {
            color: #0d6efd;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
            
            // Auto-dismiss alerts after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert')
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert)
                    bsAlert.close()
                })
            }, 5000)
        })
    </script>
    @endpush
@endsection