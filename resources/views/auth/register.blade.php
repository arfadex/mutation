@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nEnfants" class="col-md-4 col-form-label text-md-end">{{ __('Nombre d Enfants') }}</label>
                        
                            <div class="col-md-6">
                                <input id="nEnfants" type="number" class="form-control @error('nEnfants') is-invalid @enderror" name="nEnfants" value="{{ old('nEnfants') }}" required>
                        
                                @error('nEnfants')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="dateN" class="col-md-4 col-form-label text-md-end">{{ __('Date de naissance') }}</label>
                        
                            <div class="col-md-6">
                                <input id="dateN" type="date" class="form-control @error('dateN') is-invalid @enderror" name="dateN" value="{{ old('dateN') }}" required>
                        
                                @error('dateN')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="dateAffLycee" class="col-md-4 col-form-label text-md-end">{{ __('Date d Affiliation au lycée') }}</label>
                        
                            <div class="col-md-6">
                                <input id="dateAffLycee" type="date" class="form-control @error('dateAffLycee') is-invalid @enderror" name="dateAffLycee" value="{{ old('dateAffLycee') }}" required>
                        
                                @error('dateAffLycee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- <div class="row mb-3">
                            <label for="etatCivil" class="col-md-4 col-form-label text-md-end">{{ __('État civil') }}</label>
                        
                            <div class="col-md-6">
                                <input id="etatCivil" type="text" class="form-control @error('etatCivil') is-invalid @enderror" name="etatCivil" value="{{ old('etatCivil') }}" required>
                        
                                @error('etatCivil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <label for="etatCivil" class="col-md-4 col-form-label text-md-end">{{ __('État civil') }}</label>
                        
                            <div class="col-md-6">
                                <select id="etatCivil" class="form-control @error('etatCivil') is-invalid @enderror" name="etatCivil" required>
                                    <option value="">Sélectionnez votre état civil</option>
                                    <option value="Célibataire" {{ old('etatCivil') == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                                    <option value="Marié" {{ old('etatCivil') == 'Marié' ? 'selected' : '' }}>Marié</option>
                                    <option value="Divorcé" {{ old('etatCivil') == 'Divorcé' ? 'selected' : '' }}>Divorcé</option>
                                    <option value="Veuf/Veuve" {{ old('etatCivil') == 'Veuf/Veuve' ? 'selected' : '' }}>Veuf/Veuve</option>
                                </select>
                        
                                @error('etatCivil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Identifiant') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmez le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
