<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Système de gestion des demandes de mutation des enseignants">
    <meta name="theme-color" content="#0f172a">

    <title>Mutation - Système de Mutation des Enseignants</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            color-scheme: dark;
            --primary: #38bdf8;
            --primary-soft: rgba(56, 189, 248, 0.18);
            --primary-strong: rgba(56, 189, 248, 0.35);
            --surface: rgba(15, 23, 42, 0.78);
            --surface-strong: rgba(15, 23, 42, 0.92);
            --border: rgba(148, 163, 184, 0.35);
            --muted: #94a3b8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at 15% 15%, rgba(56, 189, 248, 0.12), transparent 45%),
                        radial-gradient(circle at 85% 10%, rgba(129, 140, 248, 0.12), transparent 40%),
                        linear-gradient(135deg, #0b1120 0%, #0f172a 40%, #111827 100%);
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        a {
            text-decoration: none;
        }

        .text-muted {
            color: var(--muted) !important;
        }

        .navbar {
            background: rgba(15, 23, 42, 0.88) !important;
            backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--border);
        }

        .navbar-brand {
            font-size: 1.55rem;
            font-weight: 700;
            background: linear-gradient(135deg, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar .nav-link {
            color: rgba(226, 232, 240, 0.78) !important;
            font-weight: 500;
            padding: 0.6rem 1rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: var(--primary) !important;
            transform: translateY(-1px);
        }

        .navbar-toggler {
            border: 1px solid var(--border);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.1rem var(--primary-strong);
        }

        .hero-section {
            position: relative;
            overflow: hidden;
            padding: 9rem 0 6rem;
        }

        .hero-section::before,
        .hero-section::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            filter: blur(80px);
            opacity: 0.55;
        }

        .hero-section::before {
            width: 380px;
            height: 380px;
            top: -120px;
            right: -120px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.35), transparent 65%);
        }

        .hero-section::after {
            width: 420px;
            height: 420px;
            bottom: -200px;
            left: -160px;
            background: radial-gradient(circle, rgba(129, 140, 248, 0.28), transparent 60%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            background: rgba(56, 189, 248, 0.12);
            border: 1px solid var(--primary-soft);
            color: var(--primary);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .hero-title {
            font-size: clamp(2.75rem, 5vw, 4.25rem);
            font-weight: 800;
            line-height: 1.05;
            margin-top: 1.5rem;
            margin-bottom: 1.25rem;
            background: linear-gradient(135deg, #e2e8f0 0%, #94a3b8 60%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 1.1rem;
            color: rgba(226, 232, 240, 0.76);
            line-height: 1.8;
        }

        .hero-actions {
            gap: 1rem;
        }

        .btn {
            border-radius: 0.9rem;
            font-weight: 600;
            padding: 0.75rem 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #38bdf8, #0ea5e9);
            border: none;
            box-shadow: 0 18px 40px rgba(14, 165, 233, 0.25);
            color: #0b1120;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 50px rgba(14, 165, 233, 0.35);
            background: linear-gradient(135deg, #5ecff8, #22d3ee);
            color: #082f49;
        }

        .btn-outline-light {
            border: 1px solid var(--border);
            color: #e2e8f0;
            background: rgba(15, 23, 42, 0.3);
        }

        .btn-outline-light:hover {
            background: rgba(226, 232, 240, 0.08);
            border-color: rgba(226, 232, 240, 0.4);
            transform: translateY(-3px);
        }

        .hero-highlights {
            margin-top: 1.5rem;
        }

        .highlight-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.6rem 1rem;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: rgba(15, 23, 42, 0.6);
            font-size: 0.95rem;
            color: rgba(226, 232, 240, 0.8);
        }

        .highlight-pill i {
            color: var(--primary);
        }

        .hero-visual {
            position: relative;
            z-index: 2;
            display: grid;
            gap: 1.5rem;
            max-width: 420px;
            margin: 3rem auto 0;
        }

        .hero-visual .hero-glow {
            position: absolute;
            inset: -20%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.35), transparent 65%);
            filter: blur(60px);
            z-index: 1;
        }

        .glass-card {
            position: relative;
            z-index: 2;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.92), rgba(30, 41, 59, 0.65));
            border: 1px solid var(--border);
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: 0 25px 60px rgba(2, 6, 23, 0.45);
            backdrop-filter: blur(18px);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-6px);
            border-color: var(--primary-strong);
        }

        .glass-card .icon {
            width: 3.25rem;
            height: 3.25rem;
            border-radius: 1rem;
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.25), rgba(14, 165, 233, 0.45));
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #38bdf8;
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
        }

        .glass-card h5 {
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .glass-card p {
            margin-bottom: 0;
            color: rgba(226, 232, 240, 0.7);
        }

        .glass-card.secondary {
            margin-left: auto;
            margin-top: -1.25rem;
        }

        .stats-section {
            padding: 4.5rem 0;
            background: rgba(15, 23, 42, 0.55);
            border-block: 1px solid var(--border);
        }

        .stat-card {
            background: rgba(15, 23, 42, 0.78);
            border: 1px solid var(--border);
            border-radius: 1.1rem;
            padding: 1.8rem;
            text-align: center;
            box-shadow: 0 18px 40px rgba(2, 6, 23, 0.35);
        }

        .stat-card .stat-label {
            display: block;
            font-size: 0.75rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(148, 163, 184, 0.85);
            margin-bottom: 0.75rem;
        }

        .stat-card .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #f8fafc;
        }

        .section-intro .section-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.1rem;
            border-radius: 999px;
            background: rgba(56, 189, 248, 0.12);
            border: 1px solid var(--primary-soft);
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--primary);
        }

        .section-title {
            font-size: clamp(2.1rem, 4vw, 3rem);
            font-weight: 800;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            color: #e2e8f0;
        }

        .section-subtitle {
            color: rgba(226, 232, 240, 0.7);
            max-width: 720px;
            margin: 0 auto;
        }

        .feature-card {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.65));
            border: 1px solid var(--border);
            border-radius: 1.2rem;
            padding: 2rem;
            height: 100%;
            box-shadow: 0 22px 40px rgba(2, 6, 23, 0.35);
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary-strong);
            box-shadow: 0 30px 60px rgba(14, 165, 233, 0.22);
        }

        .feature-icon {
            width: 3.3rem;
            height: 3.3rem;
            border-radius: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.28), rgba(14, 165, 233, 0.55));
            color: #38bdf8;
            font-size: 1.4rem;
            margin-bottom: 1.25rem;
        }

        #about {
            background: rgba(15, 23, 42, 0.4);
        }

        .about-card {
            background: rgba(15, 23, 42, 0.78);
            border: 1px solid var(--border);
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 24px 48px rgba(2, 6, 23, 0.4);
        }

        .checklist {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .checklist li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.85rem;
            color: rgba(226, 232, 240, 0.78);
        }

        .checklist li i {
            color: var(--primary);
        }

        .about-visual {
            margin-top: 0;
        }

        footer {
            background: rgba(15, 23, 42, 0.78);
            border-top: 1px solid var(--border);
        }

        .footer-badge {
            width: 2.75rem;
            height: 2.75rem;
            border-radius: 0.9rem;
            background: rgba(56, 189, 248, 0.18);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
        }

        @media (min-width: 992px) {
            .hero-visual {
                margin: 0 0 0 auto;
            }

            .hero-section {
                padding: 10rem 0 7rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                Mutation
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">À propos</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a class="btn btn-primary" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Connexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="hero-content">
                            <span class="hero-tag">
                                <i class="fas fa-wand-magic-sparkles"></i>
                                Plateforme 360°
                            </span>
                            <h1 class="hero-title">
                                Gérez les mutations d'enseignants sans friction
                            </h1>
                            <p class="hero-description mb-4">
                                Une solution élégante et puissante pour planifier, suivre et valider les mutations des
                                enseignants à l'échelle régionale. Chaque étape est guidée pour offrir une expérience
                                claire et sécurisée aux équipes académiques.
                            </p>
                            <div class="d-flex flex-wrap hero-actions">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-arrow-right me-2"></i>
                                    Se connecter
                                </a>
                                <a href="#features" class="btn btn-outline-light btn-lg">
                                    <i class="fas fa-circle-info me-2"></i>
                                    Découvrir la plateforme
                                </a>
                            </div>
                            <div class="hero-highlights d-flex flex-wrap gap-3">
                                <span class="highlight-pill">
                                    <i class="fas fa-shield-check"></i>
                                    Processus sécurisé
                                </span>
                                <span class="highlight-pill">
                                    <i class="fas fa-bolt"></i>
                                    Flux automatisés
                                </span>
                                <span class="highlight-pill">
                                    <i class="fas fa-chart-line"></i>
                                    Statistiques claires
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-visual">
                            <div class="hero-glow"></div>
                            <div class="glass-card primary">
                                <div class="icon">
                                    <i class="fas fa-route"></i>
                                </div>
                                <h5>Parcours simplifié</h5>
                                <p>Centralisez les demandes et suivez chaque étape depuis un tableau de bord unifié et intuitif.</p>
                            </div>
                            <div class="glass-card secondary">
                                <div class="icon">
                                    <i class="fas fa-gauge-high"></i>
                                </div>
                                <h5>Vision en temps réel</h5>
                                <p>Visualisez la disponibilité des établissements et les priorités en quelques secondes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-6 col-lg-3">
                        <div class="stat-card">
                            <span class="stat-label">Régions connectées</span>
                            <span class="stat-number">12</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="stat-card">
                            <span class="stat-label">Académies actives</span>
                            <span class="stat-number">34</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="stat-card">
                            <span class="stat-label">Établissements suivis</span>
                            <span class="stat-number">48</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="stat-card">
                            <span class="stat-label">Disponibilité système</span>
                            <span class="stat-number">100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-5">
            <div class="container">
                <div class="section-intro text-center mb-5">
                    <span class="section-pill">
                        <i class="fas fa-sparkles"></i>
                        Fonctionnalités clés
                    </span>
                    <h2 class="section-title">Une plateforme unifiée pour toutes vos mutations</h2>
                    <p class="section-subtitle">
                        De la demande initiale à la validation finale, Mutation combine automatisation, visibilité et
                        sécurité pour fluidifier le parcours de chaque enseignant.
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card h-100">
                            <div class="feature-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h5 class="text-white mb-3">Authentification sécurisée</h5>
                            <p>Connexion multi-rôles, gestion des permissions et journalisation complète de chaque action.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card h-100">
                            <div class="feature-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h5 class="text-white mb-3">Gestion des demandes</h5>
                            <p>Créez, priorisez et suivez les demandes de mutation avec une traçabilité totale.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card h-100">
                            <div class="feature-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h5 class="text-white mb-3">Tableau de bord décisionnel</h5>
                            <p>Visualisez les indicateurs clés pour prendre des décisions rapides et alignées avec les objectifs.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card h-100">
                            <div class="feature-icon">
                                <i class="fas fa-gears"></i>
                            </div>
                            <h5 class="text-white mb-3">Automatisation intelligente</h5>
                            <p>Des workflows configurables qui s'ajustent aux règles académiques et aux priorités locales.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card h-100">
                            <div class="feature-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <h5 class="text-white mb-3">Interface moderne</h5>
                            <p>Une expérience claire et immersive, conçue pour rester confortable même lors de longues sessions.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card h-100">
                            <div class="feature-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h5 class="text-white mb-3">Performance optimale</h5>
                            <p>Laravel 12 et Vite assurent une application rapide, réactive et évolutive.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-5">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="about-card">
                            <h2 class="section-title text-start">Pensé pour les équipes académiques</h2>
                            <p class="text-muted mb-4">
                                Notre système de mutation des enseignants simplifie la coordination entre rectorats,
                                académies et établissements. Les interfaces sont conçues pour guider les utilisateurs
                                à chaque étape tout en garantissant la conformité réglementaire.
                            </p>
                            <ul class="checklist mb-4">
                                <li><i class="fas fa-check"></i> Processus personnalisables selon vos règles locales</li>
                                <li><i class="fas fa-check"></i> Notifications ciblées pour ne manquer aucune échéance</li>
                                <li><i class="fas fa-check"></i> Historique complet des décisions et validations</li>
                            </ul>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <i class="fas fa-play me-2"></i>
                                    Commencer
                                </a>
                                <a href="#features" class="btn btn-outline-light">
                                    <i class="fas fa-arrow-up-right-from-square me-2"></i>
                                    Voir les fonctionnalités
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-visual about-visual">
                            <div class="hero-glow"></div>
                            <div class="glass-card primary">
                                <div class="icon">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                                <h5>Architecture moderne</h5>
                                <p>Développé sur Laravel 12 et Vite pour offrir stabilité, sécurité et évolutivité.</p>
                            </div>
                            <div class="glass-card secondary">
                                <div class="icon">
                                    <i class="fas fa-users-gear"></i>
                                </div>
                                <h5>Rôles personnalisés</h5>
                                <p>Adaptez les permissions aux besoins de chaque académie et établissement scolaire.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="py-5 mt-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="footer-badge">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <span class="fw-bold text-white">Mutation</span>
                            <div class="text-muted">Système de mutation des enseignants</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <small class="text-muted">
                        &copy; {{ date('Y') }} Tous droits réservés. Développé avec ❤️ en Laravel 12.
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
                const targetId = this.getAttribute('href');
                if (targetId.length > 1) {
                    e.preventDefault();
                    const target = document.querySelector(targetId);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>
