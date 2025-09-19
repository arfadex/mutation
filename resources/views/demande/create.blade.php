@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header bg-black text-white text-center">
                    <p class="lead fw-normal mb-0 me-3 mt-3">Demande de Mutation</p>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h5 class="card-title">Créer une nouvelle demande de mutation</h5>
                        <p class="text-muted">Vous allez créer une demande de mutation pour {{ Auth::user()->prenom }} {{ Auth::user()->nom }}</p>
                    </div>
                    
                    <form action="{{ route('demande.store')}}" method="POST">
                        @csrf

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-plus me-2"></i>Créer la demande
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
