# Système de Mutation des Enseignants

Un système moderne de gestion des demandes de mutation des enseignants, développé avec Laravel 12, offrant une interface intuitive, un mode sombre, et un support PWA complet.

## 🎯 Concept du Système

Ce système permet aux enseignants de soumettre des demandes de mutation vers différents lycées, avec un système de priorité et de gestion administrative complète. Les administrateurs peuvent examiner, approuver ou rejeter les demandes, tout en ayant accès à des tableaux de bord détaillés et des analytiques.

### Fonctionnalités Principales

- **🔐 Authentification sécurisée** avec système de rôles (Enseignant/Admin)
- **📱 Interface responsive** optimisée pour mobile et desktop
- **🌙 Mode sombre** avec basculement en temps réel
- **📲 Support PWA** pour installation sur Android et iOS
- **👨‍💼 Tableau de bord administrateur** avec gestion complète des demandes
- **📊 Analytiques avancées** et statistiques en temps réel
- **🎨 Design moderne** avec animations fluides

## 🚀 Installation et Configuration

### Prérequis

- **PHP 8.2+**
- **Composer**
- **Node.js 18+** et npm
- **MySQL 8.0+** ou **PostgreSQL 13+**
- **Git**

### Installation

1. **Cloner le repository**
   ```bash
   git clone <repository-url>
   cd mutation
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances Node.js**
   ```bash
   npm install
   ```

4. **Configuration de l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configuration de la base de données**
   
   Éditez le fichier `.env` et configurez votre base de données :
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mutation
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Exécution des migrations et seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Compilation des assets**
   ```bash
   npm run dev
   # ou pour la production
   npm run build
   ```

8. **Démarrage du serveur**
   ```bash
   php artisan serve
   ```

L'application sera accessible à l'adresse : `http://localhost:8000`

## 👥 Comptes par Défaut

### Administrateur
- **Username:** `admin`
- **Password:** `admin123`
- **Email:** `admin@mutation.ma`

### Enseignants de Test
- **Username:** `ahmed.alami` | **Password:** `password123`
- **Username:** `fatima.benali` | **Password:** `password123`
- **Username:** `mohammed.chraibi` | **Password:** `password123`

## 🎨 Fonctionnalités

### Pour les Enseignants

1. **Connexion sécurisée** avec username/mot de passe
2. **Création de demandes** de mutation
3. **Sélection de lycées** avec système de priorité (ordre 1, 2, 3...)
4. **Suivi des demandes** et historique des mutations
5. **Interface responsive** adaptée aux mobiles

### Pour les Administrateurs

1. **Tableau de bord complet** avec statistiques en temps réel
2. **Gestion des demandes** (approbation/rejet avec notes)
3. **Gestion des enseignants** et de leurs profils
4. **Analytiques avancées** et rapports
5. **Filtres et recherche** avancés

### Fonctionnalités Techniques

- **Mode sombre/clair** avec persistance des préférences
- **PWA (Progressive Web App)** avec installation native
- **Service Worker** pour le cache et l'offline
- **Design responsive** avec Bootstrap 5.3
- **Animations CSS** et transitions fluides
- **API REST** pour les interactions dynamiques

## 📱 Support PWA

L'application est entièrement compatible PWA et peut être installée sur :

- **Android** : Via Chrome ou navigateurs compatibles
- **iOS** : Via Safari (iOS 11.3+)
- **Desktop** : Via Chrome, Edge, Firefox

### Fonctionnalités PWA

- Installation native sur l'écran d'accueil
- Fonctionnement hors ligne (cache des ressources)
- Notifications push (prévu pour les futures versions)
- Interface native avec barre d'adresse masquée

## 🎨 Thèmes et Personnalisation

### Mode Sombre

- **Activation automatique** par défaut
- **Basculement en temps réel** via le bouton dans la navbar
- **Persistance** des préférences utilisateur
- **Thème adaptatif** pour tous les composants

### Palette de Couleurs

- **Primaire:** #5dd0ff (Bleu cyan)
- **Sombre:** #0d1b2a (Bleu marine)
- **Surface sombre:** #1a2332
- **Texte clair:** #e2e8f0

## 🗄️ Structure de la Base de Données

### Tables Principales

- **`users`** : Profils des enseignants et administrateurs
- **`regions`** : Régions administratives
- **`academies`** : Académies régionales
- **`lycees`** : Établissements scolaires
- **`demandes`** : Demandes de mutation
- **`detail_demandes`** : Détails des lycées demandés par ordre de priorité

### Relations

- Un enseignant peut avoir plusieurs demandes
- Une demande peut contenir plusieurs lycées (avec ordre de priorité)
- Les lycées appartiennent à des académies
- Les académies appartiennent à des régions

## 🔧 Développement

### Structure du Projet

```
mutation/
├── app/
│   ├── Http/Controllers/
│   │   ├── AdminController.php      # Gestion administrative
│   │   ├── DemandeController.php    # Gestion des demandes
│   │   └── HomeController.php       # Page d'accueil
│   ├── Models/
│   │   ├── User.php                 # Modèle utilisateur
│   │   ├── Demande.php              # Modèle demande
│   │   └── ...
│   └── Http/Middleware/
│       └── DarkModeMiddleware.php   # Gestion du mode sombre
├── resources/
│   ├── views/
│   │   ├── admin/                   # Vues administrateur
│   │   ├── demande/                 # Vues demandes
│   │   └── layouts/
│   │       └── app.blade.php        # Layout principal
│   ├── sass/
│   │   └── app.scss                 # Styles avec mode sombre
│   └── js/
│       └── app.js                   # JavaScript
├── public/
│   ├── manifest.json                # Manifest PWA
│   └── sw.js                        # Service Worker
└── database/
    ├── migrations/                  # Migrations de base
    └── seeders/                     # Données de test
```

### Commandes Utiles

```bash
# Développement
php artisan serve
npm run dev

# Production
npm run build
php artisan optimize

# Base de données
php artisan migrate:fresh --seed
php artisan db:seed

# Cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 🚀 Déploiement

### Production

1. **Configuration serveur**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan optimize
   ```

2. **Variables d'environnement**
   - Configurez `APP_ENV=production`
   - Définissez `APP_DEBUG=false`
   - Configurez votre base de données de production

3. **Permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

## 📊 Monitoring et Logs

- **Logs Laravel** : `storage/logs/laravel.log`
- **Cache** : Gestion automatique via Laravel
- **Sessions** : Stockage en base de données
- **Erreurs** : Affichage adaptatif selon l'environnement

## 🤝 Contribution

1. Fork le projet
2. Créez une branche feature (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 🆘 Support

Pour toute question ou problème :

1. Consultez la documentation Laravel
2. Vérifiez les issues existantes
3. Créez une nouvelle issue avec les détails du problème

## 🔮 Roadmap

- [ ] Notifications push
- [ ] API mobile native
- [ ] Système de messagerie interne
- [ ] Export PDF des demandes
- [ ] Intégration calendrier
- [ ] Multi-langue (Arabe/Français)

---

**Développé avec ❤️ en Laravel 12**
