<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'RentFast - Contactez-nous')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="@yield('keywords', 'location voiture, contact, service client')">
    <meta name="description" content="@yield('description', 'Contactez le service client de RentFast pour toute question ou demande de renseignement')">

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
                        <a href="{{ url('/index') }}" class="nav-item nav-link">Accueil</a>
                        <a href="{{ url('/index#propos') }}" class="nav-item nav-link">À propos</a>
                        <a href="{{ url('/index#Services') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ url('/index#blog') }}" class="nav-item nav-link">Blog</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ url('/index#caractéristiques') }}"
                                    class="dropdown-item">caractéristiques</a>
                                <a href="{{ url('/index#Catégories') }}" class="dropdown-item">Notre véhicules</a>
                                <a href="{{ url('/index#team') }}" class="dropdown-item">Notre equipe</a>
                                <a href="{{ url('/index#testimonial') }}" class="dropdown-item">Témoignage</a>
                            </div>
                        </div>

                        <a href="{{ url('/contact') }}" class="nav-item nav-link active">Contact</a>
                    </div>

                    @auth
                        <a href="{{ route('logout') }}" class="btn btn-primary rounded-pill py-2 px-4"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4">Connexion</a>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contactez-nous</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/index') }}">Accueil</a></li>
                <li class="breadcrumb-item active text-primary">Contact</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center mb-5">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-primary mb-3">Nous sommes à votre écoute</h1>
                <p class="mb-0">Une question, une demande particulière ? Notre équipe vous répond dans les plus brefs
                    délais.</p>
            </div>

            <div class="row g-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Adresse</h4>
                                    <p class="mb-0">123, Rue des Palmiers, Marrakech</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fas fa-envelope fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Email</h4>
                                    <p class="mb-0"><a href="mailto:contact@rentfast.com"
                                            class="text-dark">contact@rentfast.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Téléphone</h4>
                                    <p class="mb-0">+212 522 123 456</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fas fa-clock fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Horaires</h4>
                                    <p class="mb-0">Lun-Ven: 8h-18h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5 rounded">
                        <h4 class="text-primary mb-4">Envoyez-nous votre message</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="titre" name="titre"
                                            placeholder="titre" required>
                                        <label for="titre">titre</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Votre message" id="message" name="message" style="height: 160px"
                                            required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-light w-100 py-3" type="submit">Envoyer Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-xl-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="p-5 bg-light rounded">
                        <h3 class="text-primary mb-4">Nos agences</h3>

                        <div class="bg-white rounded p-4 mb-4">
                            <h4 class="mb-3">Marrakech</h4>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">123 Rue des Palmiers, 40000</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">+212 522 123 456</p>
                            </div>
                        </div>

                        <div class="bg-white rounded p-4 mb-4">
                            <h4 class="mb-3">Casablanca</h4>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">Avenue des FAR, 20000</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">+212 522 654 321</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="rounded overflow-hidden">
                        <iframe class="rounded w-100" style="height: 450px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.34589057912!2d-8.020345!3d31.629472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafeef02a8451ad%3A0x0!2s123%20Rue%20des%20Palmiers%2C%20Marrakech!5e0!3m2!1sen!2sma!4v1694259649153!5m2!1sen!2sma"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">À propos de nous</h4>
                        <p class="mb-3">RentFast propose des solutions de location de véhicules adaptées à tous vos
                            besoins, avec un service client exceptionnel.</p>
                        <div class="d-flex">
                            <a class="btn btn-secondary btn-md-square rounded-circle me-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-2" href="#"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Liens rapides</h4>
                        <a href="{{ url('/index') }}"><i class="fas fa-angle-right me-2"></i> Accueil</a>
                        <a href="{{ url('/index#Services') }}"><i class="fas fa-angle-right me-2"></i> Services</a>
                        <a href="{{ url('/index#Catégories') }}"><i class="fas fa-angle-right me-2"></i>
                            Véhicules</a>
                        <a href="{{ url('/index#team') }}"><i class="fas fa-angle-right me-2"></i> Notre équipe</a>
                        <a href="{{ url('/contact') }}"><i class="fas fa-angle-right me-2"></i> Contact</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Horaires d'ouverture</h4>
                        <div class="mb-3">
                            <h6 class="text-muted mb-0">Lundi - Vendredi:</h6>
                            <p class="text-white mb-0">08:00 - 18:00</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted mb-0">Samedi:</h6>
                            <p class="text-white mb-0">09:00 - 17:00</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted mb-0">Dimanche:</h6>
                            <p class="text-white mb-0">Fermé</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Contactez-nous</h4>
                        <a href="#"><i class="fa fa-map-marker-alt me-2"></i> 123 Rue des Palmiers,
                            Marrakech</a>
                        <a href="mailto:contact@rentfast.com"><i class="fas fa-envelope me-2"></i>
                            contact@rentfast.com</a>
                        <a href="tel:+212522123456"><i class="fas fa-phone me-2"></i> +212 522 123 456</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-white"><a href="{{ url('/') }}" class="text-white">RentFast</a> &copy;
                        {{ date('Y') }} Tous droits réservés.</span>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span class="text-white">Conçu par <a href="#" class="text-white">Votre équipe</a></span>
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
