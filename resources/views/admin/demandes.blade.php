@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div>
                    <h1 class="h3 mb-1 fw-bold">Gestion des demandes</h1>
                    <p class="text-muted mb-0">Examinez et gérez toutes les demandes de mutation</p>
                </div>
                <div class="d-flex gap-2 mt-3 mt-md-0">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                    <a href="{{ route('admin.analytics') }}" class="btn btn-primary">
                        <i class="fas fa-chart-bar me-1"></i> Analytiques
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" class="row g-3">
                        <div class="col-md-3">
                            <label for="status" class="form-label">Statut</label>
                            <select name="status" id="status" class="form-select">
                                <option value="">Tous les statuts</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approuvée</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejetée</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="search" class="form-label">Rechercher</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Nom, prénom ou username..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="date_from" class="form-label">Date de début</label>
                            <input type="date" name="date_from" id="date_from" class="form-control" value="{{ request('date_from') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="date_to" class="form-label">Date de fin</label>
                            <input type="date" name="date_to" id="date_to" class="form-control" value="{{ request('date_to') }}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search me-1"></i> Filtrer
                            </button>
                            <a href="{{ route('admin.demandes') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i> Effacer
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Demandes Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>Liste des demandes
                    </h5>
                    <span class="badge bg-primary">{{ $demandes->total() }} demandes</span>
                </div>
                <div class="card-body p-0">
                    @if($demandes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Enseignant</th>
                                        <th>Date de demande</th>
                                        <th>Lycées demandés</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($demandes as $demande)
                                        <tr>
                                            <td>
                                                <span class="fw-semibold">#{{ $demande->idDemande }}</span>
                                            </td>
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
                                                        <br>
                                                        <small class="text-muted">{{ $demande->professeur->email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{ $demande->dateDem->format('d/m/Y') }}</div>
                                                <small class="text-muted">{{ $demande->dateDem->diffForHumans() }}</small>
                                            </td>
                                            <td>
                                                @if($demande->detailDemandes->count() > 0)
                                                    <div class="d-flex flex-wrap gap-1">
                                                        @foreach($demande->detailDemandes->take(3) as $detail)
                                                            <span class="badge bg-light text-dark">
                                                                {{ $detail->numOrdre }}. {{ $detail->lycee->nomLycee }}
                                                            </span>
                                                        @endforeach
                                                        @if($demande->detailDemandes->count() > 3)
                                                            <span class="badge bg-secondary">+{{ $demande->detailDemandes->count() - 3 }} autres</span>
                                                        @endif
                                                    </div>
                                                @else
                                                    <span class="text-muted">Aucun lycée</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="status-badge status-{{ $demande->status ?? 'pending' }}">
                                                    {{ $demande->status_text }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.demande.show', $demande->idDemande) }}" class="btn btn-sm btn-outline-primary" title="Voir les détails">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if(($demande->status ?? 'pending') == 'pending')
                                                        <button type="button" class="btn btn-sm btn-outline-success" onclick="updateStatus({{ $demande->idDemande }}, 'approved')" title="Approuver">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="updateStatus({{ $demande->idDemande }}, 'rejected')" title="Rejeter">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="card-footer">
                            {{ $demandes->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Aucune demande trouvée</h5>
                            <p class="text-muted">Aucune demande ne correspond à vos critères de recherche.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le statut</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="statusForm" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Nouveau statut</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending">En attente</option>
                            <option value="approved">Approuvée</option>
                            <option value="rejected">Rejetée</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="admin_notes" class="form-label">Notes administratives (optionnel)</label>
                        <textarea name="admin_notes" id="admin_notes" class="form-control" rows="3" placeholder="Ajoutez des notes pour l'enseignant..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function updateStatus(demandeId, status) {
    const form = document.getElementById('statusForm');
    const statusSelect = document.getElementById('status');
    
    form.action = `/admin/demandes/${demandeId}/status`;
    statusSelect.value = status;
    
    const modal = new bootstrap.Modal(document.getElementById('statusModal'));
    modal.show();
}
</script>
@endpush
