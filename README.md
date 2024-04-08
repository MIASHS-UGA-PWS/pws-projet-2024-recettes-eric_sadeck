# Projet Recettes avec Laravel

Ce projet consiste à créer un site web permettant de rechercher et consulter des recettes. Il est réalisé avec le framework PHP Laravel.

## Fonctionnalités

Le site propose les fonctionnalités suivantes :

- **Page d'accueil :** Affiche un texte de bienvenue et les trois dernières recettes ajoutées.
- **Page des recettes :** Liste toutes les recettes avec une barre de recherche.
- **Page d'une recette :** Affiche les détails d'une recette sélectionnée.
- **Page de contact :** Permet aux utilisateurs de contacter les administrateurs du site via un formulaire.
- **Page de connexion :** Permet aux utilisateurs de se connecter a leur espace personnel.
- **Header et Footer :** Toutes les pages utilisent le même en-tête et pied de page, avec un menu de navigation dans l'en-tête.

## Mise en place du projet

### Clonage du projet

Pour cloner le projet localement, exécutez la commande suivante dans votre terminal :

```
git clone git@github.com:MIASHS-UGA-PWS/pws-projet-2024-recettes-VOTRE-TEAM.git
```

### Installation des dépendances

Assurez-vous d'avoir Composer installé sur votre machine. Ensuite, exécutez les commandes suivantes dans le répertoire du projet :

```
composer install
cp .env.example .env
php artisan key:generate
```

### Configuration de la base de données

Le projet utilise SQLite par défaut. Assurez-vous d'avoir créé un fichier `database.sqlite` dans le répertoire `database/`. Modifiez également le fichier `.env` pour spécifier l'utilisation de SQLite :

```
DB_CONNECTION=sqlite
DB_DATABASE=/ABSOLUTE_PATH/database/database.sqlite
```

### Exécution du serveur

Pour démarrer le serveur, exécutez la commande suivante :

```
php artisan serve
```

Le site sera alors accessible à l'adresse [http://localhost:8000](http://localhost:8000).

## Routes, Contrôleurs, Modèles et Vues

Le projet utilise des routes, des contrôleurs, des modèles et des vues pour gérer les différentes fonctionnalités du site. Consultez les fichiers correspondants dans les répertoires `routes`, `app/Http/Controllers`, `app/Models`, et `resources/views` pour plus de détails.

## Base de Données

La base de données du projet utilise des migrations pour créer les tables nécessaires. Vous pouvez exécuter les migrations avec la commande suivante :

```
php artisan migrate
```

Pour ajouter des données de test, vous pouvez également utiliser la commande :

```
php artisan migrate:fresh --seed
```


## Fonctionnalités du site

### Page d'accueil
- Affiche un texte de bienvenue ainsi que les 3 dernières recettes.

### Page des recettes
- Affiche une liste de toutes les recettes avec une barre de recherche.

### Page d'une recette
- Affiche les détails d'une recette spécifique après avoir été sélectionnée dans la liste des recettes.

### Page de contact
- Permet aux utilisateurs de contacter les administrateurs via un formulaire.

### Fonctionnalités supplémentaires (optionnelles)
- Gestion des commentaires sous les recettes.
- Système de notation des recettes.
- Identification/Authentification avec différents rôles (admin, utilisateur).

## Structure du projet
- Les routes sont définies dans le fichier `/routes/web.php`.
- Les contrôleurs sont situés dans le répertoire `/app/Http/Controllers/`.
- Les modèles se trouvent dans le répertoire `/app/Models/`.
- Les vues sont stockées dans le répertoire `/resources/views/`.
- Les migrations de base de données sont situées dans le répertoire `/database/migrations/`.
- Les seeders pour le remplissage de la base de données sont dans le répertoire `/database/seeders/`.

### Connexion

admin@admin.com 
admin


test@test.com
password

## Auteurs

Ce projet a été réalisé par [ERIC-TRAN et [SADECK BRAHIMA] dans le cadre du TP2 du cours PWS de la MIASHS à l'UGA.

---

Vous pouvez personnaliser ce fichier readme en remplaçant les placeholders `[...]` par vos propres informations.
