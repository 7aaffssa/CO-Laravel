@extends('stagiaire.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Ajouter un nouveau module</h1>
            </div>
            
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <h5 class="alert-heading">Erreurs de validation</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('stagiaire.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="code" name="code" 
                                       value="{{ old('code') }}" placeholder="Code" required>
                                <label for="code">Code</label>
                                <div class="invalid-feedback">
                                    Veuillez entrer un code valide.
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="title" name="title" 
                                       value="{{ old('title') }}" placeholder="Titre" required>
                                <label for="title">Titre</label>
                                <div class="invalid-feedback">
                                    Veuillez entrer un titre.
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="hours" name="hours" 
                                       value="{{ old('hours') }}" placeholder="Heures" required min="1">
                                <label for="hours">Heures</label>
                                <div class="invalid-feedback">
                                    Veuillez entrer un nombre d'heures valide.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-2"></i>Enregistrer
                        </button>
                        <a href="{{ route('stagiaire.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .card {
            border-radius: 0.5rem;
            border: none;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }
        
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
            transform: translateY(-1px);
        }
        
        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
        }
        
        .invalid-feedback {
            font-size: 0.85rem;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Bootstrap validation
        (function () {
            'use strict'
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
            
            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    @endpush
@endsection