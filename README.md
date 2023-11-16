# Mini Projet - Gestion des Stages

## Introduction

Ce mini-projet vise à créer une application de gestion de stages avec une base de données MySQL. Il comprend la création de la base de données, la mise en place des fichiers de configuration et de connexion, ainsi que la création de différentes pages pour ajouter, afficher, supprimer et modifier des données.

## Structure de la Base de Données

La base de données "stages" comporte les tables suivantes :

1. **Etudiant**
   - NCE (entier)
   - nom (chaîne)
   - prenom (chaîne)
   - classe (chaîne)

2. **Enseignant**
   - Matricule (entier)
   - nom_Ens (chaîne)
   - prenom_Ens (chaîne)

3. **Soutenance**
   - Numjury (entier)
   - date_soutenance (chaîne)
   - note (réel)
   - NCE (clé étrangère vers la table Etudiant)
   - Matricule (clé étrangère vers la table Enseignant)

4. **Administrateur**
   - id_admin (entier)
   - login (chaîne)
   - mot_de_passe (chaîne)

## Pages Principales

- Ajouter un Étudiant - ajouter_etudiant.php
Permet d'ajouter un nouvel étudiant à la table Etudiant.

- Ajouter un Enseignant - ajouter_enseignant.php
Permet d'ajouter un nouvel enseignant à la table Enseignant.

- Ajouter une Soutenance - ajouter_soutenance.php
Contient un formulaire pour l'insertion de nouvelles soutenances avec des listes déroulantes pour les étudiants et les enseignants existants.

- Liste des Étudiants - liste_etudiants.php
Affiche tous les étudiants de la table Etudiant dans un tableau HTML avec des actions pour supprimer et modifier.

- Supprimer un Étudiant - supprimer_etudiant.php
Permet de supprimer l'étudiant sélectionné à partir de la page liste_etudiants.php.

- Modifier un Étudiant - modifier_etudiant.php
Permet de modifier l'étudiant sélectionné à partir de la page liste_etudiants.php.

- Rechercher les Soutenances - rechercher.php
Affiche une liste de toutes les soutenances qui auront lieu le 15/12/2023 pour un enseignant choisi dans une liste déroulante.

- Authentification Administrateur - index.php, login.php, logout.php
La page d'accueil (index.php) contient un formulaire d'authentification où l'administrateur saisit son login et son mot de passe.
La page login.php gère l'authentification et redirige l'administrateur vers son espace.
La page logout.php permet à l'administrateur de se déconnecter.

## Conclusion

Ce mini-projet couvre divers aspects de la gestion de stages, de la création de la base de données à la manipulation des données à l'aide de pages web. Il met en œuvre des concepts tels que la connexion à la base de données, l'utilisation de PDO, la création de formulaires, et la gestion des sessions pour l'authentification de l'administrateur.
