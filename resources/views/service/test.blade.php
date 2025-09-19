@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
                        <div>
                            <span class="badge badge-soft-dark mb-2">Service en ligne</span>
                            <h1 class="h3 mb-2">Testez le service de suivi</h1>
                            <p class="text-muted mb-0">Interrogez en direct le nombre de demandes de mutation associées à un identifiant.</p>
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-outline-dark">Retour à l'accueil</a>
                    </div>
                    <form id="demandeForm" class="row g-3 align-items-end">
                        @csrf
                        <div class="col-md-8">
                            <label for="username" class="form-label fw-semibold">Identifiant</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Ex.&nbsp;: AGT5479" required>
                            <div class="form-text">Renseignez l'identifiant de l'agent pour obtenir un aperçu instantané.</div>
                        </div>
                        <div class="col-md-4 d-grid">
                            <button type="button" onclick="getDemandesCount()" class="btn btn-dark btn-lg">Nombre de mutations</button>
                        </div>
                    </form>
                    <div id="demandes_count" class="alert alert-secondary d-none mt-4" role="alert"></div>
                    <p class="small text-muted mb-0">Les données sont issues des enregistrements en temps réel et peuvent varier selon les dernières saisies.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        function getDemandesCount() {
            const username = document.getElementById('username').value.trim();
            const messageBox = document.getElementById('demandes_count');

            if (!username) {
                messageBox.textContent = 'Veuillez indiquer un identifiant avant de lancer la recherche.';
                messageBox.classList.remove('d-none', 'alert-success', 'alert-danger');
                messageBox.classList.add('alert-warning');
                return;
            }

            messageBox.classList.remove('d-none', 'alert-warning', 'alert-danger');
            messageBox.classList.add('alert-secondary');
            messageBox.textContent = 'Analyse en cours…';

            $.ajax({
                url: '/demandes/user/' + encodeURIComponent(username),
                type: 'GET',
                success: function(response) {
                    const demandesCount = response.demandes_count;
                    messageBox.classList.remove('alert-secondary', 'alert-warning', 'alert-danger');
                    messageBox.classList.add('alert-success');
                    messageBox.innerHTML = "<strong>Résultat :</strong> " + demandesCount + " demande(s) de mutation associée(s) à cet identifiant.";
                },
                error: function() {
                    messageBox.classList.remove('alert-secondary', 'alert-warning', 'alert-success');
                    messageBox.classList.add('alert-danger');
                    messageBox.textContent = "Une erreur s'est produite lors de la récupération du nombre de demandes. Réessayez plus tard.";
                }
            });
        }
    </script>
@endpush
