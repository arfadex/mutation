@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div>
                    <h1 class="h3 mb-1 fw-bold">Tableau de bord</h1>
                    <p class="text-muted mb-0">Vue d'ensemble du système de mutation des enseignants</p>
                </div>
                <div class="d-flex gap-2 mt-3 mt-md-0">
                    <a href="{{ route('admin.demandes') }}" class="btn btn-outline-primary">
                        <i class="fas fa-list me-1"></i> Voir toutes les demandes
                    </a>
                    <a href="{{ route('admin.analytics') }}" class="btn btn-primary">
                        <i class="fas fa-chart-bar me-1"></i> Analytiques
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary me-3">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div>
                        <div class="stat-number">{{ $stats['total_demandes'] }}</div>
                        <div class="stat-label">Total des demandes</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning me-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <div class="stat-number">{{ $stats['pending_demandes'] }}</div>
                        <div class="stat-label">En attente</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success me-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <div class="stat-number">{{ $stats['approved_demandes'] }}</div>
                        <div class="stat-label">Approuvées</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-info me-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <div class="stat-number">{{ $stats['total_teachers'] }}</div>
                        <div class="stat-label">Enseignants</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Demandes -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-history me-2"></i>Demandes récentes
                    </h5>
                    <a href="{{ route('admin.demandes') }}" class="btn btn-sm btn-outline-primary">Voir tout</a>
                </div>
                <div class="card-body p-0">
                    @if($recent_demandes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Enseignant</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recent_demandes as $demande)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-3">
                                                        <div class="avatar-title bg-primary text-white rounded-circle">
                                                            {{ substr($demande->professeur->prenom, 0, 1) }}{{ substr($demande->professeur->nom, 0, 1) }}
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-semibold">{{ $demande->professeur->prenom }} {{ $demande->professeur->nom }}</div>
                                                        <small class="text-muted">{{ $demande->professeur->username }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{ $demande->dateDem->format('d/m/Y') }}</div>
                                                <small class="text-muted">{{ $demande->dateDem->diffForHumans() }}</small>
                                            </td>
                                            <td>
                                                <span class="status-badge status-{{ $demande->status ?? 'pending' }}">
                                                    {{ $demande->status_text }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.demande.show', $demande->idDemande) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Aucune demande récente</h5>
                            <p class="text-muted">Les nouvelles demandes apparaîtront ici.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Quick Actions & Stats -->
        <div class="col-lg-4">
            <!-- Quick Actions -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt me-2"></i>Actions rapides
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.demandes') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list me-2"></i>Gérer les demandes
                        </a>
                        <a href="{{ route('admin.teachers') }}" class="btn btn-outline-success">
                            <i class="fas fa-users me-2"></i>Gérer les enseignants
                        </a>
                        <a href="{{ route('admin.analytics') }}" class="btn btn-outline-info">
                            <i class="fas fa-chart-bar me-2"></i>Voir les statistiques
                        </a>
                    </div>
                </div>
            </div>

            <!-- Status Distribution -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-pie me-2"></i>Répartition des statuts
                    </h5>
                </div>
                <div class="card-body">
                    @if($demandes_by_status->count() > 0)
                        @foreach($demandes_by_status as $status => $count)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="status-badge status-{{ $status }} me-2">
                                        {{ ucfirst($status) }}
                                    </span>
                                </div>
                                <div class="fw-semibold">{{ $count }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-3">
                            <i class="fas fa-chart-pie fa-2x text-muted mb-2"></i>
                            <p class="text-muted mb-0">Aucune donnée disponible</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
