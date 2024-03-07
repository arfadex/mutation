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
                    <form action="{{ route('demande.store')}}" method="POST">
                        @csrf

                        <div class="form-group input-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Identifiant" required>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-dark">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
