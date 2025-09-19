@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <div class="form-card h-100">
                    <span class="badge badge-soft-dark mb-3">Nouvelle étape</span>
                    <h2 class="h4 mb-3">Ajoutez un lycée à votre demande</h2>
                    <p class="text-muted">Sélectionnez un établissement et définissez son ordre de priorité pour compléter votre dossier de mutation.</p>
                    <form id="lyceeForm" action="{{ route('demande.addLycee') }}" method="post" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="lyceeSelect" class="form-label fw-semibold">Lycée souhaité</label>
                            <select id="lyceeSelect" class="form-select" name="lycee_id" required>
                                <option value="" disabled selected>Choisissez un lycée</option>
                                @foreach ($lycees as $lycee)
                                    <option value="{{ $lycee->idLycee }}">{{ $lycee->nomLycee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="num_ordre" class="form-label fw-semibold">Numéro d'ordre</label>
                            <input type="number" name="num_ordre" id="num_ordre" class="form-control" placeholder="1" min="1" required>
                            <div class="form-text">Utilisez des numéros uniques pour classer vos établissements par priorité.</div>
                        </div>
                        <button type="submit" id="addButton" class="btn btn-dark w-100">Ajouter à ma sélection</button>
                    </form>
                    <p class="small text-muted mt-3 mb-0">Vous pouvez ajouter jusqu'à 10 lycées. Les ajouts sont enregistrés automatiquement lors de l'envoi du formulaire.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="table-card h-100">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-3">
                        <div>
                            <span class="badge badge-soft-dark mb-2">Résumé</span>
                            <h2 class="h4 mb-0">Lycées sélectionnés</h2>
                            <p class="text-muted mb-0">Vérifiez l'ordre de priorité et ajustez votre liste si nécessaire.</p>
                        </div>
                        <a href="{{ route('demande.latestMutation') }}" class="btn btn-outline-dark">Voir les dernières mutations</a>
                    </div>
                    <div class="table-responsive">
                        <table id="lyceeTable" class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Numéro d'ordre</th>
                                    <th scope="col">Lycée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailDemandes as $detailDemande)
                                    <tr>
                                        <td class="fw-semibold">{{ $detailDemande->numOrdre }}</td>
                                        <td>{{ $detailDemande->lycee->nomLycee }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-dark px-4">Retour à l'accueil</a>
            <a href="{{ route('demande.create') }}" class="btn btn-dark px-4">Créer une nouvelle demande</a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addButton = document.getElementById('addButton');

            function addToTable() {
                const lyceeSelect = document.getElementById('lyceeSelect');
                const numOrdreInput = document.getElementById('num_ordre');
                const lyceeTableBody = document.getElementById('lyceeTable').getElementsByTagName('tbody')[0];

                const numOrdre = numOrdreInput.value;
                const selectedOption = lyceeSelect.options[lyceeSelect.selectedIndex];

                if (!numOrdre || !selectedOption || !selectedOption.value) {
                    return;
                }

                if (lyceeTableBody.rows.length >= 10) {
                    alert('Le nombre maximal de lycées (10) est atteint.');
                    return;
                }

                const newRow = lyceeTableBody.insertRow();
                const orderCell = newRow.insertCell(0);
                const lyceeCell = newRow.insertCell(1);

                orderCell.textContent = numOrdre;
                lyceeCell.textContent = selectedOption.text;

                lyceeSelect.selectedIndex = 0;
                numOrdreInput.value = '';
            }

            addButton.addEventListener('click', function () {
                addToTable();
            });
        });
    </script>
@endpush
