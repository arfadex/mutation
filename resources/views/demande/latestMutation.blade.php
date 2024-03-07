@extends('layouts.app')

@section('content')
<div class="div container">
    <div class="container">
        <h2 class="mt-4">Dernière Mutation</h2>
        @if ($detailDemandes->isEmpty())
            <p>Aucune demande de mutation trouvée.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom de Lycée</th>
                        <th>Ville</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailDemandes as $detailDemande)
                        <tr>
                            <td>{{ $detailDemande->nomLycee }}</td>
                            <td>{{ $detailDemande->ville }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="container mt-4">
        <h3>Verification de Demande</h3>
        <div class="form-group mt-3">
            <input type="number" class="form-control" id="pointsInput" placeholder="Enter points">
        </div>
        <button type="button" class="btn btn-dark mt-3" id="verifyButton">Vérifier demande</button>
        <div class="mt-3">
            <h5 id="message" class="d-none"></h5>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#verifyButton').click(function() {
            var points = parseInt($('#pointsInput').val());

            if (points > 30) {
                $('#message').text('Demande favorable').removeClass().addClass('green');
            } else if (points >= 20 && points <= 30) {
                $('#message').text('Demande normale').removeClass().addClass('black');
            } else {
                $('#message').text('Demande non favorable').removeClass().addClass('red');
            }
            $('#message').removeClass('d-none');
        });
    });
</script>
<div class="container">
    <div class="row justify-content-end">
        <div class="col-auto">
            <a href="{{ route('home') }}" class="btn btn-dark">Retour</a>
        </div>
    </div>
</div>
@endsection