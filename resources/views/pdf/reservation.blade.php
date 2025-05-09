<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de Réservation - RentFast</title>
    <style>
        @page {
            margin: 30px 50px;
            size: A4;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            line-height: 1.6;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 20px;
        }
        .logo {
            height: 80px;
            margin-bottom: 15px;
        }
        h1 {
            color: #e74c3c;
            font-size: 24px;
            margin: 10px 0;
        }
        h2 {
            color: #2c3e50;
            font-size: 18px;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
            margin: 25px 0 15px 0;
        }
        .section {
            margin-bottom: 25px;
        }
        .label {
            font-weight: bold;
            color: #2c3e50;
            min-width: 150px;
            display: inline-block;
        }
        .value {
            color: #555;
        }
        .box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #e74c3c;
            margin-bottom: 30px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .vehicle-details {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .vehicle-image {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 20px;
            border: 1px solid #ddd;
        }
        .vehicle-info {
            flex: 1;
        }
        .total-box {
            background-color: #e74c3c;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 11px;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 12px;
            text-transform: uppercase;
        }
        .status-pending {
            background-color: #f39c12;
            color: white;
        }
        .status-confirmed {
            background-color: #2ecc71;
            color: white;
        }
        .status-cancelled {
            background-color: #e74c3c;
            color: white;
        }
        .status-completed {
            background-color: #3498db;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        table th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: left;
        }
        table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .permit-image {
            width: 100%;
            max-height: 150px;
            object-fit: contain;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('storage/logo/b42c0942-0164-49ef-93b4-8e33d3325a8d.png') }}" class="logo" alt="Logo RentFast">
        <h1>CONFIRMATION DE RÉSERVATION</h1>
        <div>Référence: #{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}</div>
    </div>

    <!-- Ajoutez cette section juste après le header -->
<div style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px dashed #e74c3c; margin-bottom: 20px; text-align: center;">
    <div style="font-size: 16px; font-weight: bold; color: #e74c3c;">Votre numéro de réservation</div>
    <div style="font-size: 24px; font-weight: bold; letter-spacing: 2px; margin-top: 5px;">
        #{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}
    </div>
    <div style="font-size: 12px; margin-top: 5px; color: #666;">
        Conservez ce numéro pour toute communication avec notre service client
    </div>
</div>

    <div class="box">
        <div class="grid-container">
            <div>
                <h2>Informations Client</h2>
                <div><span class="label">Nom complet:</span> <span class="value">{{ $reservation->client->nom_complet }}</span></div>
                <div><span class="label">Email:</span> <span class="value">{{ $reservation->client->user->email }}</span></div>
            </div>
            <div>
                <h2>Détails de Réservation</h2>
                <div><span class="label">Date de création:</span> <span class="value">{{ $reservation->created_at->format('d/m/Y H:i') }}</span></div>
                <div><span class="label">Statut:</span>
                    <span class="status-badge status-{{ strtolower($reservation->statut) }}">
                        {{ ucfirst($reservation->statut) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <h2>Véhicule Loué</h2>
    <div class="vehicle-details">
        <img src="{{ public_path('assets/cars/img' . $reservation->vehicule->id . '.png') }}"
             class="vehicle-image"
             alt="{{ $reservation->vehicule->marque }} {{ $reservation->vehicule->model }}"
             onerror="this.onerror=null; this.src='{{ public_path('assets/img/car-default.png') }}'">
        <div class="vehicle-info">
            <h3>{{ $reservation->vehicule->marque }} {{ $reservation->vehicule->model }}</h3>
            <div>
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star{{ $i > $reservation->vehicule->etoiles ? ' text-body' : ' text-warning' }}"></i>
                @endfor
            </div>
            <div style="margin-top: 10px;">
                <div><span class="label">Année:</span> <span class="value">{{ $reservation->vehicule->annee }}</span></div>
                <div><span class="label">Carburant:</span> <span class="value">{{ ucfirst($reservation->vehicule->type_carburant) }}</span></div>
                <div><span class="label">Transmission:</span> <span class="value">{{ ucfirst($reservation->vehicule->transmission) }}</span></div>
            </div>
        </div>
    </div>

    <h2>Période de Location</h2>
    <table>
        <thead>
            <tr>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Durée</th>
                <th>Tarif journalier</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ \Carbon\Carbon::parse($reservation->dateDebut)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->dateFin)->format('d/m/Y') }}</td>
                <td>
                    @php
                        $start = \Carbon\Carbon::parse($reservation->dateDebut);
                        $end = \Carbon\Carbon::parse($reservation->dateFin);
                        $days = $start->diffInDays($end) + 1;
                    @endphp
                    {{ $days }} jours
                </td>
                <td>{{ $reservation->vehicule->tarif }} DH</td>
            </tr>
        </tbody>
    </table>

    <h2>Détails de Paiement</h2>
    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Location ({{ $days }} jours × {{ $reservation->vehicule->tarif }} DH/jour)</td>
                <td>{{ $reservation->vehicule->tarif * $days }} DH</td>
            </tr>
            <tr>
                <td>Taxes et frais</td>
                <td>0 DH</td>
            </tr>
            <tr style="font-weight: bold;">
                <td>Total à payer</td>
                <td>{{ $reservation->vehicule->tarif * $days }} DH</td>
            </tr>
        </tbody>
    </table>

    <h2>Documents</h2>
    <div style="display: flex; gap: 20px; margin-bottom: 20px;">
        <div style="flex: 1;">
            <div>Permis de conduire (Recto)</div>
            <img src="{{ public_path('storage/permis/' . $reservation->client_id . '__recto.jpg') }}"
                 class="permit-image"
                 alt="Permis Recto">
        </div>
        <div style="flex: 1;">
            <div>Permis de conduire (Verso)</div>
            <img src="{{ public_path('storage/permis/' . $reservation->client_id . '__verso.jpg') }}"
                 class="permit-image"
                 alt="Permis Verso">
        </div>
    </div>

    <div class="footer">
        <div>RentFast - Location de véhicules</div>
        <div>123 Rue, Casablanca, Maroc | Tél: +212 6 12 34 56 78 | Email: contact@rentfast.ma</div>
        <div style="margin-top: 10px;">Document généré le {{ date('d/m/Y à H:i') }}</div>
    </div>
</body>
</html>
