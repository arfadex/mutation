@extends('layouts.app')

@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge rounded-pill hero-badge mb-3">Nouveau portail</span>
                    <h1 class="hero-title mb-3">Suivez vos demandes de mutation en toute sérénité</h1>
                    <p class="hero-subtitle mb-4">Mutation centralise vos démarches, vous guide pas à pas et vous aide à prendre les bonnes décisions pour votre parcours professionnel.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a href="{{ route('demande.create') }}" class="btn btn-dark btn-lg px-4 py-3">Déposer une demande</a>
                        <a href="{{ route('demande.latestMutation') }}" class="btn btn-outline-dark btn-lg px-4 py-3">Consulter les mutations</a>
                    </div>
                    <div class="d-flex align-items-center gap-3 mt-4 text-muted small">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-dark rounded-pill">1</span>
                            <span>Remplissez votre identifiant</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-dark rounded-pill">2</span>
                            <span>Suivez l'état de la demande</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-illustration mx-auto">
                        <img src="{{ asset('img/img2.png') }}" alt="Tableau de bord des mutations" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-between align-items-center mb-4">
                <div class="col-lg-7">
                    <h2 class="section-title mb-3">Pourquoi choisir Mutation&nbsp;?</h2>
                    <p class="section-subtitle">Une plateforme pensée pour les équipes pédagogiques et administratives, afin de simplifier les démarches de mutation et d'assurer un suivi transparent.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <span class="feature-icon mb-3">🗂️</span>
                        <h3 class="h5">Gestion centralisée</h3>
                        <p class="mb-0 text-muted">Retrouvez toutes vos demandes au même endroit et accédez rapidement aux informations clés.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <span class="feature-icon mb-3">📊</span>
                        <h3 class="h5">Suivi en temps réel</h3>
                        <p class="mb-0 text-muted">Visualisez instantanément les dernières mutations et suivez l'évolution de vos dossiers.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <span class="feature-icon mb-3">🤝</span>
                        <h3 class="h5">Accompagnement dédié</h3>
                        <p class="mb-0 text-muted">Des outils simples et accessibles pour guider les agents et les établissements à chaque étape.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <div class="info-card h-100">
                        <h3 class="h4 mb-3">Prêt à commencer&nbsp;?</h3>
                        <p class="text-muted">En quelques clics, soumettez votre demande de mutation et obtenez une visibilité immédiate sur vos établissements souhaités.</p>
                        <a href="{{ route('demande.create') }}" class="action-link">Créer ma demande &rarr;</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-card h-100">
                        <h3 class="h4 mb-3">Vous suivez une demande&nbsp;?</h3>
                        <p class="text-muted">Consultez les dernières affectations et vérifiez la priorité de votre dossier à partir de vos points.</p>
                        <a href="{{ route('demande.latestMutation') }}" class="action-link">Voir les dernières mutations &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
