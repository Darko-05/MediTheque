# Medithèque

## Présentation

Medithèque est une application web développée en PHP permettant de consulter et de publier des méditations chrétiennes.

L’application distingue deux rôles :

* **Lecteur** : consulte les méditations publiées
* **Auteur** : publie, modifie et supprime ses propres méditations

Le projet a été réalisé afin de mettre en pratique la programmation orientée objet, la manipulation d’une base de données PostgreSQL et le développement d’une application web en PHP.

---

## Fonctionnalités

### Authentification

* Inscription
* Connexion
* Déconnexion
* Gestion des rôles (Lecteur / Auteur)
* Persistance de la connexion

### Méditations

* Consultation des méditations
* Consultation d’une méditation complète
* Ajout d’une méditation
* Modification d’une méditation
* Téléversement d’une image

### Recherche

* Recherche par mots-clés
* Filtrage par catégorie

---

## Technologies utilisées

* PHP 8
* PostgreSQL
* HTML5
* Tailwind CSS

---

## Structure du projet

```
classes/          Classes métier  
config/           Configuration de la base de données  
includes/         Fonctions et variables globales  
interface/        Interfaces PHP  
public/           Ressources publiques (CSS)  
repositories/     Accès aux données  
src/              Sources Tailwind CSS  
uploads/          Images des méditations  
```

---

## Prérequis

* PHP 8 ou supérieur
* PostgreSQL
* Nodejs
* npm

---

## Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/Darko-05/MediTheque.git
```

### 2. Se placer dans le dossier

```bash
cd MediTheque
```

### 3. Installer Tailwind CSS

```bash
npm install
```

---

## Configuration de la base de données

Les informations de connexion doivent être configurées dans :

```
config/Database.php
```

---

## Création de la base de données

Créer la base de données :

```sql
CREATE DATABASE meditheque;
```
Les tables doivent ensuite être importées depuis le dossier config/ (fichiers SQL fournis dans le projet).

Table :

* utilisateurs
* meditations

---

## Lancement du projet

Lancer le serveur PHP depuis la racine du projet :

```bash
php -S localhost:8000
```

Puis ouvrir :

```
http://localhost:8000
```

---

## Compilation de Tailwind CSS

En développement :

```bash
npm run dev
```

Pour la production :

```bash
npm run build
```

---

## Auteur

Projet réalisé par Darko
