<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inscription - RentFast</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@100;900&display=swap" rel="stylesheet">

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

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i>RentFast</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
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
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Registration Form Start -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <h3 class="text-center text-primary mb-4"><b>Inscription</b></h3>
                        <form method="POST" id="registrationForm">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="first-name" class="form-label">Prénom</label>
                                <input type="text" id="first-name" name="prenom" class="form-control rounded-pill" placeholder="Entrez votre prénom" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="last-name" class="form-label">Nom</label>
                                <input type="text" id="last-name" name="nom" class="form-control rounded-pill" placeholder="Entrez votre nom" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Adresse e-mail</label>
                                <input type="email" id="email" name="email" class="form-control rounded-pill" placeholder="Entrez votre e-mail" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tel" class="form-label">Téléphone</label>
                                <input type="tel" id="tel" name="tel" class="form-control rounded-pill" placeholder="Entrez votre numéro de téléphone" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="MotDePasse" class="form-label">Mot de passe</label>
                                <input type="password" id="MotDePasse" name="MotDePasse" class="form-control rounded-pill" placeholder="Entrez votre mot de passe" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="confirm-password" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" id="confirm-password" name="confirm-password" class="form-control rounded-pill" placeholder="Confirmez votre mot de passe" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" id="terms" name="terms" class="form-check-input" required>
                                    <label for="terms" class="form-check-label">J'accepte les <a href="#" class="text-primary">termes et conditions</a></label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill w-100 py-2">S'inscrire</button>
                        </form>
                        <p class="text-center mt-4 mb-0">Déjà un compte ? <a href="{{ url('/login') }}" class="text-primary">Connectez-vous ici</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Form End -->

    <!-- Scripts -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script> --}}

    {{-- <script>
        // Gestion du formulaire d'inscription client
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Récupérer les données du formulaire
            const firstName = document.getElementById('first-name').value;
            const lastName = document.getElementById('last-name').value;
            const email = document.getElementById('email').value;
            const MotDePasse = document.getElementById('MotDePasse').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            // Vérification du mot de passe
            if (MotDePasse !== confirmPassword) {
                alert("Les mots de passe ne correspondent pas !");
                return;
            }

            // Structure du client
            const newClient = {
                id: Date.now(),
                nom: lastName,
                prenom: firstName,
                email: email
            };

            // Charger les clients existants depuis le localStorage
            let clients = JSON.parse(localStorage.getItem('clients')) || [];

            // Ajouter le nouveau client
            clients.push(newClient);

            // Sauvegarder dans le localStorage
            localStorage.setItem('clients', JSON.stringify(clients));

            alert("Inscription réussie ! Vous pouvez maintenant vous connecter.");

            // Rediriger vers le tableau de bord ou une autre page
            window.location.href = '{{ url('/login') }}';
        });
    </script> --}}
</body>

</html>
