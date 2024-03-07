<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('jquery.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <nav class="navbar navbar-expand-md navbar-dark text-white shadow-sm" style="background-color: black;">
        <div class="container">
            <a class="navbar-brand" style="font-size: 20px;" href="{{ url('home') }}">
                Mutation 
            </a>
        </div>
    </nav>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-4">Test Service</h1>
        <form id="demandeForm" action="{{ route('demande.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username" class="mb-4 h4">Identifiant :</label>
                <input type="text" id="username" class="form-control-lg">
            </div>
            <button type="button" onclick="getDemandesCount()" class="btn btn-primary mt-4 bg-dark">Nombre de mutations</button>
        </form>
        <p id="demandes_count" class="mt-3"></p>
    </div>

    <script>
        function getDemandesCount() {
            var username = document.getElementById('username').value;
            $.ajax({
                url: '/demandes/user/' + username,
                type: 'GET',
                success: function(response) {
                    var demandesCount = response.demandes_count;
                    document.getElementById('demandes_count').innerHTML = "<span class='h5'>Nombre de demandes de mutations : " + demandesCount + "</span>";
                },
                error: function() {
                    document.getElementById('demandes_count').innerHTML = "Une erreur s'est produite lors de la récupération du nombre de demandes.";
                }
            });
        }
    </script>
</body>
</html>
