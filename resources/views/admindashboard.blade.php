<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-title {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .tab-content {
            background-color: white;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 0.25rem 0.25rem;
            padding: 20px;
        }

        .btn-add {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-add:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .nav-tabs .nav-link {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-2 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i></i>RentFast</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link ">Acceuil</a>
                        <a href="{{ url('/#propos') }}" class="nav-item nav-link">À propos</a>
                        <a href="{{ url('/#Services') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ url('/#blog') }}" class="nav-item nav-link">Blog</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ url('/#caractéristiques') }}" class="dropdown-item">caractéristiques</a>
                                <a href="{{ url('/#Catégories') }}" class="dropdown-item">Notre véhicules</a>
                                <a href="{{ url('/#team') }}" class="dropdown-item">Notre equipe</a>
                                <a href="{{ url('/#testimonial') }}" class="dropdown-item">Témoignage</a>
                            </div>
                        </div>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link active">Contact</a>
                    </div>
                    <a href="{{ url('/') }}" class="btn btn-primary rounded-pill py-2 px-4">Déconnexion</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <div class="container py-5">
        <h1 class="dashboard-title text-center mb-4">Tableau de Bord Administrateur</h1>

        <ul class="nav nav-tabs" id="adminTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="offres-tab" data-bs-toggle="tab" data-bs-target="#offres"
                    type="button" role="tab" aria-controls="offres" aria-selected="true">Offres de
                    location</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="employes-tab" data-bs-toggle="tab" data-bs-target="#employes"
                    type="button" role="tab" aria-controls="employes" aria-selected="false">Employés</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="clients-tab" data-bs-toggle="tab" data-bs-target="#clients" type="button"
                    role="tab" aria-controls="clients" aria-selected="false">Clients</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="recuperation-tab" data-bs-toggle="tab" data-bs-target="#recuperation"
                    type="button" role="tab" aria-controls="recuperation"
                    aria-selected="false">Récupération</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="service-client-tab" data-bs-toggle="tab" data-bs-target="#service-client"
                    type="button" role="tab" aria-controls="service-client" aria-selected="false">Service
                    Client</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="vehicules-tab" data-bs-toggle="tab" data-bs-target="#vehicules"
                    type="button" role="tab" aria-controls="vehicules" aria-selected="false">Véhicules</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="demandes-tab" data-bs-toggle="tab" data-bs-target="#demandes"
                    type="button" role="tab" aria-controls="demandes" aria-selected="false">Demandes</button>
            </li>
        </ul>

        <div class="tab-content" id="adminTabContent">
            <!-- Offres de location tab -->
            <div class="tab-pane fade show active" id="offres" role="tabpanel" aria-labelledby="offres-tab">
                <h2 class="mb-3">Gestion des Offres de Location</h2>
                <form id="offreForm" class="row g-3 mb-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="offreTitre" placeholder="Titre" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" id="offrePrix" placeholder="Prix" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="offreDisponibilite"
                            placeholder="Disponibilité" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-add w-100">Ajouter une offre</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Disponibilité</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="offreTableBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- Employés tab -->
            <div class="tab-pane fade" id="employes" role="tabpanel" aria-labelledby="employes-tab">
                <h2 class="mb-3">Gestion des Employés</h2>
                <form id="employeForm" class="row g-3 mb-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="employeNom" placeholder="Nom" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="employePrenom" placeholder="Prénom" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="employePoste" placeholder="Poste" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-add w-100">Ajouter un employé</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Poste</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="employeTableBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- Clients tab -->
            <div class="tab-pane fade" id="clients" role="tabpanel" aria-labelledby="clients-tab">
                <h2 class="mb-3">Gestion des Clients</h2>
                <form id="clientForm" class="row g-3 mb-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="clientNom" placeholder="Nom" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="clientPrenom" placeholder="Prénom" required>
                    </div>
                    <div class="col-md-3">
                        <input type="email" class="form-control" id="clientEmail" placeholder="Email" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-add w-100">Ajouter un client</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="clientTableBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- Récupération tab -->
            <div class="tab-pane fade" id="recuperation" role="tabpanel" aria-labelledby="recuperation-tab">
                <h2 class="mb-3">Récupération des Voitures</h2>
                <form id="recuperationForm" class="row g-3 mb-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="recuperationClient"
                            placeholder="Nom du client" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="recuperationVehicule"
                            placeholder="Modèle du véhicule" required>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" id="recuperationDate" required>
                    </div>
                    <div class="col-md-3">
                        <input type="time" class="form-control" id="recuperationHeure" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-add">Planifier la récupération</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Véhicule</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="recuperationTableBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- Service Client tab -->
            <div class="tab-pane fade" id="service-client" role="tabpanel" aria-labelledby="service-client-tab">
                <h2 class="mb-3">Service Client</h2>
                <form id="serviceClientForm" class="row g-3 mb-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="serviceClientNom" placeholder="Nom du client"
                            required>
                    </div>
                    <div class="col-md-4">
                        <input type="email" class="form-control" id="serviceClientEmail"
                            placeholder="Email du client" required>
                    </div>
                    <div class="col-md-4">
                        <input type="tel" class="form-control" id="serviceClientTelephone"
                            placeholder="Téléphone du client" required>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" id="serviceClientMessage" rows="3" placeholder="Message ou demande du client"
                            required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-add">Enregistrer la demande</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>message ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Date et Heures</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="serviceClientTableBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- Available Vehicles Tab -->
            <div class="tab-pane fade show active" id="disponibles" role="tabpanel"
                aria-labelledby="disponibles-tab">
                <!-- ... (keep your form the same) ... -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Capacité</th>
                                <th>Tarif</th>
                                <th>Options</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="vehiculesDisponiblesTableBody">
                            @foreach ($vehiculesDisponibles as $vehicule)
                                <tr>
                                    <td>{{ $vehicule->id }}</td>
                                    <td>{{ $vehicule->marque }}</td>
                                    <td>{{ $vehicule->model }}</td>
                                    <td>{{ $vehicule->capacite }}</td>
                                    <td>{{ number_format($vehicule->tarif, 2) }}€</td>
                                    <td>{{ $vehicule->options ?? 'Aucune' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Modifier</button>
                                        <button class="btn btn-sm btn-danger">Supprimer</button>
                                        <button class="btn btn-sm btn-secondary make-unavailable"
                                            data-id="{{ $vehicule->id }}">Rendre indisponible</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Unavailable Vehicles Tab -->
            <div class="tab-pane fade" id="indisponibles" role="tabpanel" aria-labelledby="indisponibles-tab">
                <div class="alert alert-info">
                    Les véhicules indisponibles sont automatiquement listés ici lorsqu'ils sont réservés ou en
                    maintenance.
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Raison</th>
                                <th>Date de retour prévue</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="vehiculesIndisponiblesTableBody">
                            @foreach ($vehiculesIndisponibles as $vehicule)
                                <tr>
                                    <td>{{ $vehicule->id }}</td>
                                    <td>{{ $vehicule->marque }}</td>
                                    <td>{{ $vehicule->model }}</td>
                                    <td>
                                        @if ($vehicule->reservations->count() > 0)
                                            Réservé (Client:
                                            {{ $vehicule->reservations->first()->client->name ?? 'Inconnu' }})
                                        @else
                                            Maintenance
                                        @endif
                                    </td>
                                    <td>
                                        @if ($vehicule->reservations->count() > 0)
                                            {{ $vehicule->reservations->first()->date_fin->format('d/m/Y') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success make-available"
                                            data-id="{{ $vehicule->id }}">Rendre disponible</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Demandes tab -->
            <div class="tab-pane fade" id="demandes" role="tabpanel" aria-labelledby="demandes-tab">
                <h2 class="mb-3">Demandes de Location</h2>
                <form id="demandeLocationForm" class="row g-3 mb-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="nomClientLocation"
                            placeholder="Nom du client" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="modeleVehiculeLocation"
                            placeholder="Modèle du véhicule" required>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" id="dateDebutLocation"
                            placeholder="Date de début" required>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" id="dateFinLocation" placeholder="Date de fin"
                            required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-add">Ajouter une demande</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom</th>
                                <th>Adresse email</th>
                                <th>Téléphone</th>
                                <th>Modèle du véhicule</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="demandesLocationTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Utility functions
        function sauvegarderLocalStorage(cle, donnees) {
            localStorage.setItem(cle, JSON.stringify(donnees));
        }

        function chargerLocalStorage(cle, defaut) {
            const donnees = localStorage.getItem(cle);
            return donnees ? JSON.parse(donnees) : defaut;
        }

        // Initialize data
        let offres = chargerLocalStorage('offres', [{
                id: 1,
                titre: "Appartement T2",
                prix: 500,
                disponibilite: "Disponible"
            },
            {
                id: 2,
                titre: "Maison T4",
                prix: 1000,
                disponibilite: "Occupé"
            },
            {
                id: 3,
                titre: "Studio",
                prix: 350,
                disponibilite: "Disponible"
            }
        ]);

        let employes = chargerLocalStorage('employes', [{
                id: 1,
                nom: "Dupont",
                prenom: "Jean",
                poste: "Agent immobilier"
            },
            {
                id: 2,
                nom: "Martin",
                prenom: "Sophie",
                poste: "Gestionnaire de biens"
            },
            {
                id: 3,
                nom: "Durand",
                prenom: "Pierre",
                poste: "Comptable"
            }
        ]);

        let clients = chargerLocalStorage('clients', [{
                id: 1,
                nom: "Lefevre",
                prenom: "Marie",
                email: "marie.lefevre@email.com"
            },
            {
                id: 2,
                nom: "Dubois",
                prenom: "Thomas",
                email: "thomas.dubois@email.com"
            },
            {
                id: 3,
                nom: "Roux",
                prenom: "Camille",
                email: "camille.roux@email.com"
            }
        ]);

        // Display functions
        function afficherOffres() {
            const tbody = document.getElementById('offreTableBody');
            tbody.innerHTML = '';
            offres.forEach(offre => {
                tbody.innerHTML += `
                    <tr>
                        <td>${offre.id}</td>
                        <td>${offre.titre}</td>
                        <td>${offre.prix}€</td>
                        <td>${offre.disponibilite}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="supprimerOffre(${offre.id})">Supprimer</button>
                        </td>
                    </tr>
                `;
            });
        }

        function afficherEmployes() {
            const tbody = document.getElementById('employeTableBody');
            tbody.innerHTML = '';
            employes.forEach(employe => {
                tbody.innerHTML += `
                    <tr>
                        <td>${employe.id}</td>
                        <td>${employe.nom}</td>
                        <td>${employe.prenom}</td>
                        <td>${employe.poste}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="supprimerEmploye(${employe.id})">Supprimer</button>
                        </td>
                    </tr>
                `;
            });
        }

        function afficherClients() {
            const tbody = document.getElementById('clientTableBody');
            tbody.innerHTML = '';
            clients.forEach(client => {
                tbody.innerHTML += `
                    <tr>
                        <td>${client.id}</td>
                        <td>${client.nom}</td>
                        <td>${client.prenom}</td>
                        <td>${client.email}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="supprimerClient(${client.id})">Supprimer</button>
                        </td>
                    </tr>
                `;
            });
        }

        // Delete functions
        function supprimerOffre(id) {
            offres = offres.filter(offre => offre.id !== id);
            sauvegarderLocalStorage('offres', offres);
            afficherOffres();
        }

        function supprimerEmploye(id) {
            employes = employes.filter(employe => employe.id !== id);
            sauvegarderLocalStorage('employes', employes);
            afficherEmployes();
        }

        function supprimerClient(id) {
            clients = clients.filter(client => client.id !== id);
            sauvegarderLocalStorage('clients', clients);
            afficherClients();
        }

        // Form event listeners
        document.getElementById('offreForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const titre = document.getElementById('offreTitre').value;
            const prix = document.getElementById('offrePrix').value;
            const disponibilite = document.getElementById('offreDisponibilite').value;
            offres.push({
                id: offres.length ? Math.max(...offres.map(o => o.id)) + 1 : 1,
                titre,
                prix: parseInt(prix),
                disponibilite
            });
            sauvegarderLocalStorage('offres', offres);
            afficherOffres();
            this.reset();
        });

        document.getElementById('employeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const nom = document.getElementById('employeNom').value;
            const prenom = document.getElementById('employePrenom').value;
            const poste = document.getElementById('employePoste').value;
            employes.push({
                id: employes.length ? Math.max(...employes.map(e => e.id)) + 1 : 1,
                nom,
                prenom,
                poste
            });
            sauvegarderLocalStorage('employes', employes);
            afficherEmployes();
            this.reset();
        });

        document.getElementById('clientForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const nom = document.getElementById('clientNom').value;
            const prenom = document.getElementById('clientPrenom').value;
            const email = document.getElementById('clientEmail').value;
            clients.push({
                id: clients.length ? Math.max(...clients.map(c => c.id)) + 1 : 1,
                nom,
                prenom,
                email
            });
            sauvegarderLocalStorage('clients', clients);
            afficherClients();
            this.reset();
        });

        // Employee dashboard functions
        document.addEventListener('DOMContentLoaded', function() {
            // Fonction pour générer un ID unique
            function generateUniqueId() {
                return Date.now().toString(36) + Math.random().toString(36).substr(2);
            }

            // Fonction pour ajouter une ligne à un tableau
            function addRowToTable(tableBodyId, data) {
                const tableBody = document.getElementById(tableBodyId);
                const row = tableBody.insertRow();
                Object.values(data).forEach(value => {
                    const cell = row.insertCell();
                    cell.textContent = value;
                });
                const actionsCell = row.insertCell();
                actionsCell.innerHTML = `
                    <button class="btn btn-sm btn-danger delete-btn" data-id="${data.id}"><i class="bi bi-trash"></i></button>
                `;
            }

            // Fonction pour charger les données depuis le localStorage
            function loadDataFromLocalStorage(key, tableBodyId) {
                const data = JSON.parse(localStorage.getItem(key)) || [];
                const tableBody = document.getElementById(tableBodyId);
                tableBody.innerHTML = '';
                data.forEach(item => addRowToTable(tableBodyId, item));
            }

            // Chargement initial des données
            loadDataFromLocalStorage('recuperations', 'recuperationTableBody');
            loadDataFromLocalStorage('serviceClient', 'serviceClientTableBody');
            loadDataFromLocalStorage('vehiculesDisponibles', 'vehiculesDisponiblesTableBody');
            loadDataFromLocalStorage('vehiculesIndisponibles', 'vehiculesIndisponiblesTableBody');
            loadDataFromLocalStorage('demandesLocation', 'demandesLocationTableBody');

            // Gestion des formulaires
            document.getElementById('recuperationForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const data = {
                    id: generateUniqueId(),
                    client: document.getElementById('recuperationClient').value,
                    vehicule: document.getElementById('recuperationVehicule').value,
                    date: document.getElementById('recuperationDate').value,
                    heure: document.getElementById('recuperationHeure').value
                };
                let recuperations = JSON.parse(localStorage.getItem('recuperations')) || [];
                recuperations.push(data);
                localStorage.setItem('recuperations', JSON.stringify(recuperations));
                addRowToTable('recuperationTableBody', data);
                this.reset();
            });

            document.getElementById('serviceClientForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const data = {
                    id: Date.now().toString(), // Unique ID
                    nom: document.getElementById('serviceClientNom').value,
                    email: document.getElementById('serviceClientEmail').value,
                    telephone: document.getElementById('serviceClientTelephone').value,
                    message: document.getElementById('serviceClientMessage').value,
                    timestamp: new Date().toISOString()
                };

                // Récupérer les messages existants depuis localStorage
                let messages = JSON.parse(localStorage.getItem('customerServiceMessages')) || [];

                // Ajouter le nouveau message
                messages.push(data);

                // Enregistrer les messages mis à jour dans localStorage
                localStorage.setItem('customerServiceMessages', JSON.stringify(messages));

                // Ajouter la ligne au tableau local
                addRowToTable('serviceClientTableBody', data);

                alert('Demande enregistrée avec succès !');
                this.reset();
            });

            // Charger les messages depuis localStorage au démarrage
            loadDataFromLocalStorage('customerServiceMessages', 'serviceClientTableBody');

            document.getElementById('vehiculeDisponibleForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const data = {
                    id: generateUniqueId(),
                    modele: document.getElementById('vehiculeDisponibleModele').value,
                    immatriculation: document.getElementById('vehiculeDisponibleImmatriculation').value,
                    kilometrage: document.getElementById('vehiculeDisponibleKilometrage').value,
                    etat: document.getElementById('vehiculeDisponibleEtat').value
                };
                let vehiculesDisponibles = JSON.parse(localStorage.getItem('vehiculesDisponibles')) || [];
                vehiculesDisponibles.push(data);
                localStorage.setItem('vehiculesDisponibles', JSON.stringify(vehiculesDisponibles));
                addRowToTable('vehiculesDisponiblesTableBody', data);
                this.reset();
            });

            document.getElementById('vehiculeIndisponibleForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const data = {
                    id: generateUniqueId(),
                    modele: document.getElementById('vehiculeIndisponibleModele').value,
                    immatriculation: document.getElementById('vehiculeIndisponibleImmatriculation')
                        .value,
                    raison: document.getElementById('vehiculeIndisponibleRaison').value,
                    dateRetour: document.getElementById('vehiculeIndisponibleDateRetour').value
                };
                let vehiculesIndisponibles = JSON.parse(localStorage.getItem('vehiculesIndisponibles')) ||
                [];
                vehiculesIndisponibles.push(data);
                localStorage.setItem('vehiculesIndisponibles', JSON.stringify(vehiculesIndisponibles));
                addRowToTable('vehiculesIndisponiblesTableBody', data);
                this.reset();
            });

            document.addEventListener('DOMContentLoaded', function() {
                const demandesTableBody = document.getElementById('demandesLocationTableBody');

                // Fonction pour charger les demandes de location depuis le localStorage
                function loadDemandesLocation() {
                    const demandesLocation = JSON.parse(localStorage.getItem('demandesLocation')) || [];
                    demandesTableBody.innerHTML = ''; // Efface le contenu précédent

                    demandesLocation.forEach((reservation) => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                            <td>${reservation.nomClient}</td>
                            <td>${reservation.modeleVehicule}</td>
                            <td>${reservation.dateDebut}</td>
                            <td>${reservation.dateFin}</td>
                            <td>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="${reservation.id}">Supprimer</button>
                            </td>
                        `;

                        demandesTableBody.appendChild(row);
                    });
                }

                // Charger les données au démarrage
                loadDemandesLocation();

                // Gérer la suppression des demandes
                demandesTableBody.addEventListener('click', function(e) {
                    if (e.target.classList.contains('delete-btn')) {
                        const id = e.target.getAttribute('data-id');
                        let demandesLocation = JSON.parse(localStorage.getItem(
                            'demandesLocation')) || [];
                        demandesLocation = demandesLocation.filter((reservation) => reservation
                            .id !== id);
                        localStorage.setItem('demandesLocation', JSON.stringify(demandesLocation));

                        // Recharger le tableau
                        loadDemandesLocation();
                    }
                });
            });

            // Gestion des actions d'édition et de suppression
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('edit-btn') || e.target.parentElement.classList.contains(
                        'edit-btn')) {
                    const button = e.target.classList.contains('edit-btn') ? e.target : e.target
                        .parentElement;
                    const id = button.getAttribute('data-id');
                    // Implémentez ici la logique d'édition
                    console.log('Édition de l\'élément avec l\'ID:', id);
                }

                if (e.target.classList.contains('delete-btn') || e.target.parentElement.classList.contains(
                        'delete-btn')) {
                    const button = e.target.classList.contains('delete-btn') ? e.target : e.target
                        .parentElement;
                    const id = button.getAttribute('data-id');
                    const row = button.closest('tr');
                    const tableBody = row.parentElement;
                    const storageKey = {
                        'recuperationTableBody': 'recuperations',
                        'serviceClientTableBody': 'serviceClient',
                        'vehiculesDisponiblesTableBody': 'vehiculesDisponibles',
                        'vehiculesIndisponiblesTableBody': 'vehiculesIndisponibles',
                        'demandesLocationTableBody': 'demandesLocation'
                    } [tableBody.id];

                    if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
                        let items = JSON.parse(localStorage.getItem(storageKey)) || [];
                        items = items.filter(item => item.id !== id);
                        localStorage.setItem(storageKey, JSON.stringify(items));
                        row.remove();
                    }
                }
            });

            // Initialize admin dashboard
            afficherOffres();
            afficherEmployes();
            afficherClients();
        });
    </script>
</body>

</html>
