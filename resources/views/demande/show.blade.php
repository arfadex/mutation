@extends('layouts.app')

@section('content')

<div class="div container">
    <h1>Détail de la demande</h1>
    <form id="lyceeForm" action="{{ route('demande.addLycee') }}" method="post">
        @csrf
        <div class="row mb-3 mt-3">
            <label for="lycee">Sélectionnez Lycée :</label>
        </div>
        <div class="row"></div>
        <select id="lyceeSelect" class="form-select" aria-label="Default select example" name="lycee_id">
            <option selected></option>
            @foreach ($lycees as $lycee)
            <option value="{{ $lycee->idLycee }}">{{ $lycee->nomLycee }}</option>
            @endforeach
        </select>
        <label for="num_ordre" class="mt-4">Num Ordre:</label>
        <input type="number" name="num_ordre" id="num_ordre">

        <button type="submit" id="addButton">Ajouter à la table</button>

    </form>

    <div id="lyceeTableContainer" class="row mt-4">
        <table id="lyceeTable" class="table">
            <thead>
                <tr>
                    <th>Num ordre</th>
                    <th>Lycée</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailDemandes as $detailDemande)
                <tr>
                    <td>{{ $detailDemande->numOrdre }}</td>
                    <td>{{ $detailDemande->lycee->nomLycee }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="div container">
    <a href="{{ Route('home') }}" class="btn btn-dark">Retour</a>
</div>

<script>

    function addToTable() {
        var lyceeSelect = document.getElementById('lyceeSelect');
        var numOrdreInput = document.getElementById('num_ordre');
        var lyceeTable = document.getElementById('lyceeTable').getElementsByTagName('tbody')[0];

        var numOrdre = numOrdreInput.value;
        var selectedLycee = lyceeSelect.options[lyceeSelect.selectedIndex].text;

        if (lyceeTable.rows.length >= 10) {
            alert("Maximum limit of 10 lycees reached!");
            return;
        }

        var newRow = lyceeTable.insertRow();
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        cell1.innerHTML = numOrdre;
        cell2.innerHTML = selectedLycee;

        lyceeSelect.selectedIndex = 0;
        numOrdreInput.value = '';
    }

    document.getElementById('addButton').addEventListener('click', addToTable);
</script>
@endsection


