<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Connexion - RentFast</title>
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

    <!-- Navbar & Hero Start -->
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
    <!-- Navbar & Hero End -->

   <!-- Login Form Start -->
   <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <h3 class="text-center text-primary mb-4"><b>Connexion</b></h3>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- INSERT THE LOGIN FORM HERE -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" id="email" name="email" class="form-control rounded-pill"
                                   value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="MotDePasse" class="form-label">Mot de passe</label>
                            <input type="password" id="MotDePasse" name="MotDePasse" class="form-control rounded-pill" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Se souvenir de moi</label>
                            </div>
                            <a href="#" class="text-primary">Mot de passe oublié ?</a>
                        </div>

                        <button type="submit" class="btn btn-primary rounded-pill w-100 py-2">Se connecter</button>
                    </form>
                    <!-- END OF LOGIN FORM -->

                    <p class="text-center mt-4 mb-0">Pas encore de compte ? <a href="{{ route('insc') }}" class="text-primary">Inscrivez-vous ici</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">À propos de nous</h4>
                        <p class="mb-3">Notre priorité est d'assurer un service client exceptionnel
                            tout en proposant une flotte diversifiée qui s'adapte aux besoins variés de nos clients.</p>
                        <div class="position-relative">
                            <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                            <button type="button" class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">Subscribe</button>
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
                        <a href="#"><i class="fas fa-envelope me-2"></i> contact@rentfast.com</a>
                        <a href="tel:+01234567890"><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                        <a href="tel:+01234567890" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                        <div class="d-flex">
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href="#"><i class="fab fa-twitter text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href="#"><i class="fab fa-instagram text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-0" href="#"><i class="fab fa-linkedin-in text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <script>
        function handleLogin(event) {
            event.preventDefault();
            const userType = document.getElementById('user-type').value;

            if (!userType) {
                alert('Veuillez sélectionner un type d’utilisateur.');
                return;
            }

            switch (userType) {
                case 'admin':
                    window.location.href = 'dashboard_admin.html';
                    break;
                case 'client':
                    window.location.href = 'index.html';
                    break;
                case 'EMP':
                    window.location.href = 'Dashborad_employe.html';
                    break;
                default:
                    alert('Type d’utilisateur invalide.');
            }
        }
    </script>

    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
