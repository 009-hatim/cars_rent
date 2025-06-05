<--  <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
-->

# 🚗 Projet : Système de gestion de location de voitures — RentFast

## 🌍 Contexte  
Avec l’évolution du secteur de la mobilité et l’essor de l’économie collaborative, les entreprises de location de voitures doivent moderniser leurs outils de gestion. Une plateforme numérique efficace permet de centraliser les opérations, de fluidifier les réservations et d'améliorer l’expérience client.  
Ce projet propose une solution innovante pour la **gestion en ligne des locations de véhicules**, combinant performance, simplicité et sécurité.

## ❗ Problématique  
Les méthodes traditionnelles de gestion des locations présentent plusieurs limites :

- 🔍 Manque de suivi en temps réel des réservations.
- 🕐 Gestion manuelle des disponibilités de véhicules.
- 📉 Faible automatisation des processus administratifs.
- 🔒 Sécurité insuffisante des données utilisateurs.

Ces limitations entraînent une perte de temps pour les administrateurs et une expérience client peu satisfaisante.

## 🎯 Objectifs  

- 🚗 Gérer la flotte de véhicules (ajout, modification, suppression).
- 📅 Permettre la **réservation en ligne** avec suivi de la disponibilité en temps réel.
- 👥 Gérer les comptes utilisateurs (clients et administrateurs).
- 📋 Offrir un **tableau de bord administrateur** complet.
- 📊 Visualiser les **statistiques des locations** et des véhicules.
- 🔒 Assurer une **authentification sécurisée** et une gestion fine des autorisations.
- 🌐 Fournir une interface **responsive** accessible sur mobile et desktop.

## 🛠️ Technologies utilisées  

- **Langage principal** : PHP  
- **Backend** : Laravel (PHP), MySQL  
- **Frontend** : HTML5, CSS, Bootstrap, JavaScript  
- **Communication asynchrone** : AJAX  
- **Base de données** : MySQL  
- **Outils** : Visual Studio Code, Git, XAMPP

## 📌 Diagrammes UML  


### ⚙️ Diagramme de classes  
![image](https://github.com/user-attachments/assets/22c1f358-b7ec-4b00-b646-cacb4adeaf5e)

### 🎯 **Diagramme de Cas d’Utilisation**  
![image](https://github.com/user-attachments/assets/b2de794d-d350-467e-a36d-a0c3d3c3d7a5)

### 🎬 **Diagramme de Séquence**  
![image](https://github.com/user-attachments/assets/8db5fb1d-bf87-4dc7-8407-865bd184c092)

## 📌 Structure du Projet  

```bash
CarsRent/
│
├── app/                              # Logique principale (Controllers, Models, Middleware)
│   ├── Http/
│   │   ├── Controllers/              # Contrôleurs Laravel (Admin, Client, Réservation, Véhicule, etc.)
│   │   └── Middleware/
│   ├── Models/                       # Modèles Laravel (User, Client, Reservation, Vehicle, etc.)
│   └── Providers/
│
├── database/                         # Base de données
│   ├── factories/
│   ├── migrations/                   # Scripts de migration des tables
│   └── seeders/
│
├── public/                           # Fichiers publics (images, CSS compilé, JS compilé)
│
├── resources/                        # Vues et ressources
│   ├── css/
│   ├── js/
│   └── views/                        # Fichiers Blade (Interface utilisateur)
│       ├── admin/                    # Pages admin (Dashboard, Gestion Clients, Véhicules, Offres, etc.)
│       ├── reservations/             # Pages de réservation
│       ├── pdf/                      # Templates PDF
│       └── autres vues (login, inscription, contact, etc.)
│
├── routes/                           # Routes Laravel
│   ├── web.php
│   └── console.php
│
├── storage/                          # Fichiers générés, logs, uploads
│
├── tests/                            # Tests unitaires et fonctionnels
│
├── .env                              # Variables d'environnement
├── artisan                           # Interface CLI Laravel
└── composer.json                     # Dépendances PHP (Laravel, packages)
```


## 🎥 **Vidéo Démonstrative**  

https://github.com/user-attachments/assets/ad74077d-dbf2-4b24-928b-e51da5c9be1e



