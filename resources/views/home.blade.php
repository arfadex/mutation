@extends('layouts.app')

@section('content')
    <div class="div container">
        <nav class="nav nav-pills nav-justified py-4" style="background-color: black;">
            <a class="nav-item nav-link" href="{{ route('demande.create') }}" style="color: white;">Demande de Mutation</a>
            <a class="nav-item nav-link" href="{{ route('demande.latestMutation') }}" style="color: white;">Dernière Mutation</a>
            <a class="nav-item nav-link" href="{{ route('service.test') }}" style="color: white;">Service</a>
          </nav>                    
    </div>
    <div class="div container">
        <img src="{{ asset('img/img2.png') }}" class="rounded mx-auto d-block" alt="...">
    </div>
@endsection
