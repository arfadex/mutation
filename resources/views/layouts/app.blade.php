<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="{{ $darkMode ? 'dark' : 'light' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Système de gestion des demandes de mutation des enseignants - Simplifiez vos démarches administratives">
    <meta name="theme-color" content="{{ $darkMode ? '#1a1a1a' : '#ffffff' }}">
    
    <!-- PWA Support -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/icon-192x192.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="{{ $darkMode ? 'black-translucent' : 'default' }}">
    <meta name="apple-mobile-web-app-title" content="Mutation">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mutation') }} - Système de Mutation des Enseignants</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="{{ $darkMode ? 'dark-mode' : 'light-mode' }}">
    <div id="app" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm app-navbar">
            <div class="container">
                <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('home') }}">
                    <i class="fas fa-graduation-cap me-2"></i>
                    <span>Mutation</span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">
                                    <i class="fas fa-home me-1"></i> Accueil
                                </a>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-cog me-1"></i> Administration
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.demandes') }}">Gestion des demandes</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.teachers') }}">Gestion des enseignants</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.analytics') }}">Analytiques</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('demande.create') }}">
                                        <i class="fas fa-plus me-1"></i> Nouvelle Demande
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('demande.latestMutation') }}">
                                        <i class="fas fa-history me-1"></i> Mes Mutations
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <!-- Dark Mode Toggle -->
                            <li class="nav-item">
                                <button class="btn btn-link nav-link border-0 p-2" id="darkModeToggle" title="Basculer le mode sombre">
                                    <i class="fas {{ $darkMode ? 'fa-sun' : 'fa-moon' }}"></i>
                                </button>
                            </li>
                        @endauth

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt me-1"></i> {{ __('Connexion') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus me-1"></i> {{ __('Inscription') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title bg-primary text-white rounded-circle">
                                            {{ substr(Auth::user()->prenom, 0, 1) }}{{ substr(Auth::user()->nom, 0, 1) }}
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <div class="fw-semibold">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</div>
                                        <small class="text-muted">{{ Auth::user()->username }}</small>
                                    </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-header">
                                        <div class="fw-semibold">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</div>
                                        <small class="text-muted">{{ Auth::user()->email }}</small>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <i class="fas fa-home me-2"></i> Mon Profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> {{ __('Déconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="flex-grow-1">
            @yield('content')
        </main>
    </div>
    
    <footer class="app-footer py-4 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-graduation-cap me-2"></i>
                        <span class="fw-semibold">Mutation</span>
                        <span class="text-muted ms-2">&mdash; Simplifiez vos démarches administratives</span>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex flex-wrap justify-content-md-end gap-3">
                        @auth
                            <a class="footer-link" href="{{ route('demande.create') }}">Nouvelle demande</a>
                            <a class="footer-link" href="{{ route('demande.latestMutation') }}">Mes mutations</a>
                            @if(Auth::user()->isAdmin())
                                <a class="footer-link" href="{{ route('admin.dashboard') }}">Administration</a>
                            @endif
                        @endauth
                        <a class="footer-link" href="{{ route('service.test') }}">Services</a>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <small class="text-muted">&copy; {{ date('Y') }} Système de Mutation des Enseignants. Tous droits réservés.</small>
                </div>
                <div class="col-md-6 text-md-end">
                    <small class="text-muted">Version 2.0 - Laravel 12</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- PWA Install Prompt -->
    <div id="pwa-install-prompt" class="position-fixed bottom-0 end-0 m-3" style="display: none;">
        <div class="card shadow-lg border-0">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-mobile-alt text-primary me-3"></i>
                    <div class="flex-grow-1">
                        <h6 class="mb-1">Installer l'application</h6>
                        <small class="text-muted">Ajoutez cette app à votre écran d'accueil</small>
                    </div>
                    <button class="btn btn-sm btn-primary me-2" id="install-pwa">Installer</button>
                    <button class="btn btn-sm btn-outline-secondary" id="dismiss-pwa">×</button>
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')
    
    <!-- Dark Mode Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const darkModeToggle = document.getElementById('darkModeToggle');
            const html = document.documentElement;
            
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', function() {
                    fetch('{{ route("toggle.dark.mode") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        location.reload();
                    });
                });
            }

            // PWA Install Prompt
            let deferredPrompt;
            const installPrompt = document.getElementById('pwa-install-prompt');
            const installBtn = document.getElementById('install-pwa');
            const dismissBtn = document.getElementById('dismiss-pwa');

            window.addEventListener('beforeinstallprompt', (e) => {
                e.preventDefault();
                deferredPrompt = e;
                installPrompt.style.display = 'block';
            });

            if (installBtn) {
                installBtn.addEventListener('click', async () => {
                    if (deferredPrompt) {
                        deferredPrompt.prompt();
                        const { outcome } = await deferredPrompt.userChoice;
                        if (outcome === 'accepted') {
                            installPrompt.style.display = 'none';
                        }
                        deferredPrompt = null;
                    }
                });
            }

            if (dismissBtn) {
                dismissBtn.addEventListener('click', () => {
                    installPrompt.style.display = 'none';
                });
            }

            // Register Service Worker
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/sw.js')
                        .then((registration) => {
                            console.log('SW registered: ', registration);
                        })
                        .catch((registrationError) => {
                            console.log('SW registration failed: ', registrationError);
                        });
                });
            }
        });
    </script>
</body>
</html>
