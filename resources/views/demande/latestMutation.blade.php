@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="table-card h-100">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
                        <div>
                            <span class="badge badge-soft-dark mb-2">Mises à jour</span>
                            <h2 class="h3 mb-0">Dernières mutations enregistrées</h2>
                            <p class="text-muted mb-0">Surveillez les affectations des lycées et anticipez vos prochaines étapes.</p>
                        </div>
                        <a href="{{ route('demande.create') }}" class="btn btn-outline-dark">Déposer une demande</a>
                    </div>
                    @if ($detailDemandes->isEmpty())
                        <div class="alert alert-info mb-0" role="alert">
                            Aucune demande de mutation n'a encore été enregistrée.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom de lycée</th>
                                        <th scope="col">Ville</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailDemandes as $detailDemande)
                                        <tr>
                                            <td class="fw-semibold">{{ $detailDemande->nomLycee }}</td>
                                            <td>{{ $detailDemande->ville }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-5">
                <div class="verification-card h-100">
                    <h3 class="h4 mb-3">Vérifiez la priorité de votre demande</h3>
                    <p class="text-dark mb-4">Saisissez votre total de points pour obtenir un avis instantané sur la probabilité d'acceptation de votre mutation.</p>
                    <label for="pointsInput" class="form-label fw-semibold">Total de points</label>
                    <input type="number" min="0" class="form-control" id="pointsInput" placeholder="Ex.&nbsp;: 28">
                    <button type="button" class="btn btn-dark btn-lg w-100 mt-4" id="verifyButton">Analyser ma demande</button>
                    <div id="message" class="alert mt-4 d-none" role="alert"></div>
                    <p class="small text-dark mt-3 mb-0">Ce résultat est une estimation basée sur les seuils habituels observés. Votre situation finale dépendra des décisions administratives.</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-dark px-4">Retour à l'accueil</a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        $(function() {
            const $message = $('#message');

            $('#verifyButton').on('click', function() {
                const points = parseInt($('#pointsInput').val(), 10);

                $message.removeClass('d-none alert-success alert-warning alert-danger alert-info');

                if (Number.isNaN(points)) {
                    $message
                        .addClass('alert alert-warning')
                        .text('Veuillez saisir un total de points valide pour analyser la demande.');
                    return;
                }

                if (points > 30) {
                    $message
                        .addClass('alert alert-success')
                        .text('Votre demande présente un excellent niveau de priorité.');
                } else if (points >= 20) {
                    $message
                        .addClass('alert alert-info')
                        .text('Votre dossier est en bonne voie, pensez à vérifier les pièces justificatives.');
                } else {
                    $message
                        .addClass('alert alert-danger')
                        .text('La demande risque d’être refusée. Envisagez d’autres options ou contactez le service.');
                }

                $message.removeClass('d-none');
            });
        });
    </script>
@endpush
