<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Détails de Réservation - RentFast</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i>RentFast</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ url('/index') }}" class="nav-item nav-link">Acceuil</a>
                        <a href="#propos" class="nav-item nav-link">À propos</a>
                        <a href="#Services" class="nav-item nav-link">Service</a>
                        <a href="#blog" class="nav-item nav-link">Blog</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="#caractéristiques" class="dropdown-item">caractéristiques</a>
                                <a href="#Catégories" class="dropdown-item">Notre véhicules</a>
                                <a href="#team" class="dropdown-item">Notre equipe</a>
                                <a href="#testimonial" class="dropdown-item">Témoignage</a>
                            </div>
                        </div>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                        @auth
                            @php
                                $reservation = Auth::user()->client?->reservations()->latest()->first();
                            @endphp

                            @if ($reservation)
                                <a href="{{ route('reservation.show', $reservation->id) }}"
                                    class="nav-item nav-link active">
                                    Ma Réservation
                                </a>
                            @endif
                        @endauth
                    </div>
                    <a href="{{ url('/') }}" class="btn btn-primary rounded-pill py-2 px-4">Déconnexion</a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Reservation Details Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <!-- Ajoutez cette section juste après le début de la section Reservation Details -->
            <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <h4 class="alert-heading"><i class="fas fa-info-circle me-2"></i> Votre numéro de réservation
                        </h4>
                        <div class="d-flex align-items-center mt-3">
                            <div class="bg-white text-success rounded-pill py-2 px-4 me-3"
                                style="font-size: 24px; font-weight: bold;">
                                #{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}
                            </div>
                            <div>
                                <p class="mb-0">Utilisez ce numéro pour toute communication avec notre service client.
                                </p>
                                <p class="mb-0">Vous pouvez copier le numéro en cliquant sur le bouton ci-dessous.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-2">
                            <p class="mb-2"><i class="fas fa-exclamation-circle me-2"></i>Si vous souhaitez annuler
                                votre réservation ou prolonger la durée de location, veuillez contacter notre service
                                client.</p>
                        </div>
                        <button class="btn btn-outline-success btn-sm mt-2" onclick="copyReservationId()">
                            <i class="fas fa-copy me-2"></i>Copier le numéro
                        </button>
                    </div>

                    <script>
                        function copyReservationId() {
                            const reservationId = "#{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}";
                            navigator.clipboard.writeText(reservationId).then(() => {
                                alert('Numéro de réservation copié : ' + reservationId);
                            });
                        }
                    </script>
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div class="card border-0 shadow rounded-4 h-100">
                                <div class="card-header bg-primary text-white rounded-top-4 py-3">
                                    <h3 class="mb-0"><i class="fas fa-car me-2"></i> Détails du Véhicule</h3>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <img src="{{ asset('assets/cars/img' . $reservation->vehicule->id . '.png') }}"
                                                class="img-fluid rounded-3 shadow-sm"
                                                alt="{{ $reservation->vehicule->marque }} {{ $reservation->vehicule->model }}"
                                                onerror="this.onerror=null; this.src='{{ asset('assets/img/car-default.png') }}'">
                                        </div>
                                        <div class="col-md-8">
                                            <h4 class="text-primary">{{ $reservation->vehicule->marque }}
                                                {{ $reservation->vehicule->model }}</h4>
                                            <div class="d-flex mb-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="fas fa-star{{ $i > $reservation->vehicule->etoiles ? ' text-body' : ' text-warning' }}"></i>
                                                @endfor
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <p class="mb-1"><i class="fas fa-users text-primary me-2"></i>
                                                        {{ $reservation->vehicule->capacite }} places</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-1"><i
                                                            class="fas fa-gas-pump text-primary me-2"></i>
                                                        {{ ucfirst($reservation->vehicule->type_carburant) }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-1"><i class="fas fa-cogs text-primary me-2"></i>
                                                        {{ ucfirst($reservation->vehicule->transmission) }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-1"><i class="fas fa-road text-primary me-2"></i>
                                                        {{ number_format($reservation->vehicule->kilometrage) }} km</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-light p-4 rounded-3">
                                        <h5 class="mb-3"><i class="fas fa-calendar-alt text-primary me-2"></i>
                                            Période de location</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Date de début:</strong></p>
                                                <p class="bg-white p-2 rounded">
                                                    {{ \Carbon\Carbon::parse($reservation->dateDebut)->format('d/m/Y') }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Date de fin:</strong></p>
                                                <p class="bg-white p-2 rounded">
                                                    {{ \Carbon\Carbon::parse($reservation->dateFin)->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>

                                        @php
                                            $start = \Carbon\Carbon::parse($reservation->dateDebut);
                                            $end = \Carbon\Carbon::parse($reservation->dateFin);
                                            $days = $start->diffInDays($end) + 1;

                                            $tarifJour = $reservation->vehicule->tarif;
                                            $totalSansReduction = $tarifJour * $days;

                                            $reductionPourcent = 0;
                                            $montantReduction = 0;
                                            $total = $totalSansReduction;

                                            if ($reservation->offre && $reservation->offre->desponibilite === 'oui')
 {
                                                $reductionPourcent = $reservation->offre->reduction;
                                                $montantReduction = ($totalSansReduction * $reductionPourcent) / 100;
                                                $total = $totalSansReduction - $montantReduction;
                                            }
                                        @endphp

                                        <div class="mt-3">
                                            <h5 class="mb-3"><i
                                                    class="fas fa-money-bill-wave text-primary me-2"></i> Détails du
                                                paiement</h5>
                                            <div class="bg-white p-3 rounded">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Tarif : {{ number_format($tarifJour, 2) }} DH ×
                                                        {{ $days }} jours</span>
                                                    <span>{{ number_format($totalSansReduction, 2) }} DH</span>
                                                </div>

                                                @if ($reductionPourcent > 0)
                                                    <div class="d-flex justify-content-between text-success mb-2">
                                                        <span>Réduction ({{ $reductionPourcent }}%)</span>
                                                        <span>- {{ number_format($montantReduction, 2) }} DH</span>
                                                    </div>
                                                @endif

                                                <hr>
                                                <div class="d-flex justify-content-between fw-bold">
                                                    <span>Total à payer</span>
                                                    <span>{{ number_format($total, 2) }} DH</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card border-0 shadow rounded-4 h-100">
                                <div class="card-header bg-primary text-white rounded-top-4 py-3">
                                    <h3 class="mb-0"><i class="fas fa-user-circle me-2"></i> Informations Client
                                    </h3>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-4">
                                        <h5 class="text-primary mb-3"><i class="fas fa-id-card me-2"></i> Client</h5>
                                        <div class="bg-light p-3 rounded">
                                            <p class="mb-1"><strong>Nom complet:</strong>
                                                {{ $reservation->client->nom_complet }}</p>
                                            <p class="mb-0"><strong>Email:</strong>
                                                {{ $reservation->client->user->email }}</p>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="text-primary mb-3"><i class="fas fa-car me-2"></i> Statut de la
                                            réservation</h5>
                                        <div class="p-3 rounded bg-light">
                                            @php
                                                $statusClass =
                                                    [
                                                        'en attente' => 'warning',
                                                        'confirmée' => 'success',
                                                        'annulée' => 'danger',
                                                        'terminée' => 'info',
                                                    ][strtolower($reservation->statut)] ?? 'secondary';
                                            @endphp
                                            <span
                                                class="badge bg-{{ $statusClass }} py-2 px-3 fs-6">{{ ucfirst($reservation->statut) }}</span>
                                            <p class="mt-2 mb-0">Votre réservation est actuellement
                                                {{ strtolower($reservation->statut) }}.</p>
                                        </div>
                                    </div>

                                    <div>
                                        <h5 class="text-primary mb-3"><i class="fas fa-id-card me-2"></i> Permis de
                                            conduire</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="border p-2 rounded bg-white text-center">
                                                    <p class="fw-bold mb-2">Recto</p>
                                                    <img src="{{ asset('storage/permis/' . $reservation->client_id . '__recto.png') }}"
                                                        alt="Permis Recto" class="img-fluid rounded shadow-sm"
                                                        style="max-height: 200px;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="border p-2 rounded bg-white text-center">
                                                    <p class="fw-bold mb-2">Verso</p>
                                                    <img src="{{ asset('storage/permis/' . $reservation->client_id . '__verso.png') }}"
                                                        alt="Permis Verso" class="img-fluid rounded shadow-sm"
                                                        style="max-height: 200px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('index') }}" class="btn btn-secondary btn-lg px-4 me-3">
                            <i class="fas fa-arrow-left me-2"></i> Retour à l'accueil
                        </a>
                        <a href="{{ route('reservation.download', $reservation->id) }}"
                            class="btn btn-primary btn-lg px-4">
                            <i class="fas fa-file-pdf me-2"></i> Télécharger en PDF
                        </a>

                        @if (strtolower($reservation->statut) === 'en attente')
                            <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST"
                                class="d-inline-block ms-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg px-4"
                                    onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation?')">
                                    <i class="fas fa-times me-2"></i> Annuler la réservation
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Reservation Details End -->

            <!-- Footer Start -->
            <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item d-flex flex-column">
                                <div class="footer-item">
                                    <h4 class="text-white mb-4">À propos de nous</h4>
                                    <p class="mb-3">Notre priorité est d'assurer un service client exceptionnel
                                        tout en proposant une flotte diversifiée qui s'adapte aux besoins variés de nos
                                        clients.</p>
                                </div>
                                <div class="position-relative">
                                    <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                        placeholder="Enter your email">
                                    <button type="button"
                                        class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">Subscribe</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item d-flex flex-column">
                                <h4 class="text-white mb-4">Liens rapides</h4>
                                <a href="#"><i class="fas fa-angle-right me-2"></i> À propos</a>
                                <a href="#"><i class="fas fa-angle-right me-2"></i> Voitures</a>
                                <a href="#"><i class="fas fa-angle-right me-2"></i> Types de voitures</a>
                                <a href="#"><i class="fas fa-angle-right me-2"></i> Équipe</a>
                                <a href="#"><i class="fas fa-angle-right me-2"></i> Contactez-nous</a>
                                <a href="#"><i class="fas fa-angle-right me-2"></i> Conditions générales</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item d-flex flex-column">
                                <h4 class="text-white mb-4">Heures d'ouverture</h4>
                                <div class="mb-3">
                                    <h6 class="text-muted mb-0">Lundi - Vendredi:</h6>
                                    <p class="text-white mb-0">09.00 am to 07.00 pm</p>
                                </div>
                                <div class="mb-3">
                                    <h6 class="text-muted mb-0">Samedi:</h6>
                                    <p class="text-white mb-0">10.00 am to 05.00 pm</p>
                                </div>
                                <div class="mb-3">
                                    <h6 class="text-muted mb-0">Vacances:</h6>
                                    <p class="text-white mb-0">Tout le dimanche c'est nos vacances</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item d-flex flex-column">
                                <h4 class="text-white mb-4">Informations de contact</h4>
                                <a href="#"><i class="fa fa-map-marker-alt me-2"></i> 123 Rue, New York, USA</a>
                                <a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i>
                                    info@example.com</a>
                                <a href="tel:+012 345 67890"><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                                <a href="tel:+012 345 67890" class="mb-3"><i class="fas fa-print me-2"></i> +012
                                    345
                                    67890</a>
                                <div class="d-flex">
                                    <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i
                                            class="fab fa-facebook-f text-white"></i></a>
                                    <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i
                                            class="fab fa-twitter text-white"></i></a>
                                    <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i
                                            class="fab fa-instagram text-white"></i></a>
                                    <a class="btn btn-secondary btn-md-square rounded-circle me-0" href=""><i
                                            class="fab fa-linkedin-in text-white"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

            <!-- Copyright Start -->
            <div class="container-fluid copyright py-4">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6 text-center text-md-start mb-md-0">
                            <span class="text-body"><a href="#" class="border-bottom text-white"><i
                                        class="fas fa-copyright text-light me-2"></i>RentFast</a>, Tous droits
                                réservés.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i
                    class="fa fa-arrow-up"></i></a>

            <!-- JavaScript Libraries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
            <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
            <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
            <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

            <!-- Template Javascript -->
            <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
