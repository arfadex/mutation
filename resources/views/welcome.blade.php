<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Système de gestion des demandes de mutation des enseignants">
    <meta name="theme-color" content="#1a1a1a">

    <title>Mutation - Système de Mutation des Enseignants</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0d1b2a 0%, #1a2332 50%, #2d3748 100%);
            min-height: 100vh;
        }
        
        .hero-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, rgba(93, 208, 255, 0.1), rgba(13, 27, 42, 0.3));
        }
        
        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            background: linear-gradient(135deg, #5dd0ff, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            color: #cbd5e0;
            margin-bottom: 2rem;
        }
        
        .feature-card {
            background: rgba(26, 35, 50, 0.8);
            border: 1px solid rgba(93, 208, 255, 0.2);
            border-radius: 1rem;
            padding: 2rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            border-color: rgba(93, 208, 255, 0.4);
            box-shadow: 0 20px 40px rgba(93, 208, 255, 0.1);
        }
        
        .feature-icon {
            width: 4rem;
            height: 4rem;
            background: linear-gradient(135deg, #5dd0ff, #1b98e0);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1.5rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #5dd0ff, #1b98e0);
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(93, 208, 255, 0.3);
        }
        
        .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 0.75rem;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }
        
        .navbar {
            background: rgba(13, 27, 42, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(93, 208, 255, 0.2);
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #5dd0ff !important;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: #5dd0ff !important;
        }
        
        .stats-section {
            background: rgba(26, 35, 50, 0.5);
            border-top: 1px solid rgba(93, 208, 255, 0.2);
            border-bottom: 1px solid rgba(93, 208, 255, 0.2);
        }
        
        .stat-item {
            text-align: center;
            padding: 2rem 1rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #5dd0ff;
            display: block;
        }
        
        .stat-label {
            color: #cbd5e0;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                Mutation
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Connexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title mb-4">
                            Système de Mutation des Enseignants
                        </h1>
                        <p class="hero-subtitle">
                            Simplifiez la gestion des demandes de mutation avec notre plateforme moderne et intuitive. 
                            Gérez efficacement les transferts d'enseignants entre établissements.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Se connecter
                            </a>
                            <a href="#features" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-info-circle me-2"></i>
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <div class="feature-icon mx-auto mb-4">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="feature-card h-100">
                                    <i class="fas fa-mobile-alt feature-icon mx-auto"></i>
                                    <h5 class="text-white">Mobile First</h5>
                                    <p class="text-muted small">Interface optimisée pour tous les appareils</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="feature-card h-100">
                                    <i class="fas fa-moon feature-icon mx-auto"></i>
                                    <h5 class="text-white">Mode Sombre</h5>
                                    <p class="text-muted small">Interface moderne et confortable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">12</span>
                        <span class="stat-label">Régions</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">34</span>
                        <span class="stat-label">Académies</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">48</span>
                        <span class="stat-label">Lycées</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Sécurisé</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="text-white mb-3">Fonctionnalités Principales</h2>
                    <p class="text-muted">Une plateforme complète pour la gestion des mutations</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h5 class="text-white mb-3">Authentification Sécurisée</h5>
                        <p class="text-muted">Système de connexion sécurisé avec gestion des rôles pour enseignants et administrateurs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h5 class="text-white mb-3">Gestion des Demandes</h5>
                        <p class="text-muted">Créez et suivez vos demandes de mutation avec un système de priorité pour les lycées.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h5 class="text-white mb-3">Tableau de Bord Admin</h5>
                        <p class="text-muted">Interface d'administration complète avec statistiques et gestion des demandes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5 class="text-white mb-3">Application Mobile</h5>
                        <p class="text-muted">PWA installable sur mobile avec support offline et notifications.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h5 class="text-white mb-3">Mode Sombre</h5>
                        <p class="text-muted">Interface moderne avec basculement entre mode clair et sombre.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h5 class="text-white mb-3">Performance</h5>
                        <p class="text-muted">Application rapide et optimisée avec Laravel 12 et technologies modernes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="text-white mb-4">À propos du système</h2>
                    <p class="text-muted mb-4">
                        Notre système de mutation des enseignants a été conçu pour simplifier et moderniser 
                        la gestion des demandes de transfert entre établissements scolaires. 
                    </p>
                    <p class="text-muted mb-4">
                        Avec une interface intuitive, un système de rôles sécurisé et des fonctionnalités 
                        avancées, nous offrons une solution complète pour les enseignants et les administrateurs.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-play me-2"></i>
                            Commencer
                        </a>
                        <a href="#features" class="btn btn-outline-light">
                            <i class="fas fa-arrow-up me-2"></i>
                            Voir les fonctionnalités
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <div class="feature-icon mx-auto mb-4" style="width: 6rem; height: 6rem; font-size: 2.5rem;">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4 class="text-white mb-3">Développé avec Laravel 12</h4>
                        <p class="text-muted">
                            Utilisant les dernières technologies web pour une expérience utilisateur optimale.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 border-top border-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-graduation-cap me-2 text-primary"></i>
                        <span class="fw-bold text-white">Mutation</span>
                        <span class="text-muted ms-2">- Système de Mutation des Enseignants</span>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <small class="text-muted">
                        &copy; {{ date('Y') }} Tous droits réservés. Développé avec ❤️ en Laravel 12
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Smooth scrolling -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
