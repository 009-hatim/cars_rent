<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cental - Car Rent Website Template</title>
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
                <a href="" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i></i>RentFast</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Acceuil</a>
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
                    </div>
                    <a href="{{ url('/insc') }}" class="btn btn-primary rounded-pill py-2 px-4">Get Started</a>
                    <a href="{{ url('/login') }}" class="btn btn-primary rounded-pill py-2 px-4">Connexion</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Carousel Start -->
    <div class="header-carousel">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="Premier slide" />
                    <div class="carousel-caption">
                        <div class="container py-4">
                            <div class="row g-5">

                                <div class="col-lg-6 d-none d-lg-flex fadeInRight animated" data-animation="fadeInRight"
                                    data-delay="1s" style="animation-delay: 1s;">
                                    <div class="text-start">
                                        <h1 class="display-5 text-white" style="text-align:center">Obtenez 15% de
                                            réduction sur votre location ! Planifiez votre voyage maintenant</h1>
                                        <p style="text-align:center">Faites-vous plaisir aux Maroc</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Features Start -->
    <div id="caractéristiques" class="container-fluid feature py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">caractéristiques <span
                        class="text-primary">centrales</span></h1>
                <p class="mb-0">Découvrez les principales caractéristiques de nos services de location de voitures,
                    conçues pour répondre à vos besoins et garantir une expérience exceptionnelle à chaque étape.
                </p>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-xl-4">
                    <div class="row gy-4 gx-0">
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <span class="fa fa-trophy fa-2x"></span>
                                </div>
                                <div class="ms-4">
                                    <h5 class="mb-3">Service de première classe</h5>
                                    <p class="mb-0">Un service premium qui garantit confort et satisfaction pour
                                        chaque client.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <span class="fa fa-road fa-2x"></span>
                                </div>
                                <div class="ms-4">
                                    <h5 class="mb-3">Assistance routière 24/7</h5>
                                    <p class="mb-0">Une assistance routière disponible à tout moment pour assurer
                                        votre tranquillité d'esprit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                    <img src="{{ asset('assets/img/features-img.png') }}" class="img-fluid w-100" style="object-fit: cover;"
                        alt="Img">
                </div>
                <div class="col-xl-4">
                    <div class="row gy-4 gx-0">
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="feature-item justify-content-end">
                                <div class="text-end me-4">
                                    <h5 class="mb-3">Qualité au meilleur prix</h5>
                                    <p class="mb-0">Des véhicules de qualité à des prix compétitifs pour répondre à
                                        tous les budgets.</p>
                                </div>
                                <div class="feature-icon">
                                    <span class="fa fa-tag fa-2x"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="feature-item justify-content-end">
                                <div class="text-end me-4">
                                    <h5 class="mb-3">Prise en charge et retour gratuits</h5>
                                    <p class="mb-0">Des services de prise en charge et de retour gratuits pour une
                                        expérience sans tracas.</p>
                                </div>
                                <div class="feature-icon">
                                    <span class="fa fa-map-pin fa-2x"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- About Start -->
    <div id="propos" class="container-fluid overflow-hidden about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item">
                        <div class="pb-5">
                            <h1 class="display-5 text-capitalize">À propos<span class="text-primary"> de
                                    RentFast</span></h1>
                            <p class="mb-0">RentFast a été créé pour offrir une solution fiable et efficace pour vos
                                besoins
                                de transport. Avec des années d'expérience dans l'industrie, nous nous engageons à
                                fournir des
                                services de location de voitures de qualité, accessibles et flexibles.
                            </p>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="about-item-inner border p-4">
                                    <div class="about-icon mb-4">
                                        <img src="{{ asset('assets/img/about-icon-1.png')}}" class="img-fluid w-50 h-50" alt="Icon">
                                    </div>
                                    <h5 class="mb-3">Notre Vision</h5>
                                    <p class="mb-0">Devenir le leader de la location de voitures grâce à l'innovation
                                        et à l'excellence.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-item-inner border p-4">
                                    <div class="about-icon mb-4">
                                        <img src="{{ asset('assets/img/about-icon-2.png')}}" class="img-fluid h-50 w-50" alt="Icon">
                                    </div>
                                    <h5 class="mb-3">Notre Mission</h5>
                                    <p class="mb-0">Simplifier vos déplacements avec des services de location fiables
                                        et personnalisés.</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-item my-4">Notre priorité est d'assurer un service client exceptionnel
                            tout en proposant une flotte diversifiée qui s'adapte aux besoins variés de nos clients.</p>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="text-center rounded bg-secondary p-4">
                                    <h1 class="display-6 text-white">17</h1>
                                    <h5 class="text-light mb-0">ans d'expérience</h5>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="rounded">
                                    <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Un service
                                        fiable et personnalisé.</p>
                                    <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Une flotte
                                        moderne et variée.</p>
                                    <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> 17 ans
                                        d'expertise reconnue.</p>
                                    <p class="mb-0"><i class="fa fa-check-circle text-primary me-1"></i> La
                                        satisfaction avant tout.</p>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/attachment-img.jpg')}}"
                                        class="img-fluid rounded-circle border border-4 border-secondary"
                                        style="width: 100px; height: 100px;" alt="Image">
                                    <div class="ms-4">
                                        <h4>William Burgess</h4>
                                        <p class="mb-0">Carveo Founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="about-img">
                        <div class="img-1">
                            <img src="{{ asset('assets/img/about-img.jpg') }}" class="img-fluid rounded h-100 w-100" alt="">
                        </div>
                        <div class="img-2">
                            <img src="{{ asset('img/about-img-1.jpg')}}" class="img-fluid rounded w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Fact Counter -->
    <div class="container-fluid counter py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-thumbs-up fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">829</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Clients satisfaits</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-car-alt fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">56</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Nombre de voitures</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">127</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Centre de voitures</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">589</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Total de kilomètres</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Counter -->

    <!-- Début des services -->
    <div id="Services" class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Services <span class="text-primary">centraux</span></h1>
                <p class="mb-0">Les Services centraux sont conçus pour offrir une gestion optimale de vos besoins de
                    location de véhicules. Que ce soit pour des réservations, des tarifs spéciaux ou des services
                    complémentaires, notre équipe veille à ce que chaque aspect de votre expérience soit pris en charge
                    avec
                    professionnalisme et efficacité.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-phone-alt fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Réservation téléphonique</h5>
                        <p class="mb-0">Notre service de réservation téléphonique est à votre disposition
                            pour toute assistance personnalisée et garantir une réservation rapide et efficace.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-money-bill-alt fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Tarifs spéciaux</h5>
                        <p class="mb-0">Profitez de nos tarifs spéciaux adaptés à vos besoins, que ce soit pour des
                            groupes, des professionnels ou des occasions spécifiques.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-road fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Location aller simple</h5>
                        <p class="mb-0">Facilitez vos déplacements avec notre service de location aller simple,
                            vous permettant de restituer le véhicule dans une autre ville ou destination.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-umbrella fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Assurance vie</h5>
                        <p class="mb-0">Offrez-vous une sécurité supplémentaire avec notre assurance vie,
                            conçue pour couvrir tous les imprévus lors de vos locations.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-building fa-2x"></i>
                        </div>
                        <h5 class="mb-3">De ville à ville</h5>
                        <p class="mb-0">Simplifiez vos voyages avec notre service de ville à ville,
                            idéal pour les déplacements entre différentes destinations.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-car-alt fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Trajets gratuits</h5>
                        <p class="mb-0">Bénéficiez de trajets gratuits pour des locations
                            longues durées ou selon des offres spéciales en cours.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin des services -->


    <!-- Car categories Start -->
    <div id="Catégories" class="container-fluid categories pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Catégories <span class="text-primary">de véhicules</span>
                </h1>
                <p class="mb-0">Les catégories de véhicules offrent une variété d'options adaptées à tous les
                    besoins.</p>
            </div>
            <div class="categories-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($vehicules as $vehicule)
                    <div class="categories-item p-4">
                        <div class="categories-item-inner">
                            <div class="categories-img rounded-top">
                                <img src="{{ asset('assets/cars/img' . $vehicule->id . '.png') }}"
                                    class="img-fluid w-100 rounded-top"
                                    alt="{{ $vehicule->marque }} {{ $vehicule->model }}"
                                    onerror="this.onerror=null; this.src='{{ asset('assets/img/car-default.png') }}'">
                            </div>
                            <div class="categories-content rounded-bottom p-4">
                                <h4>{{ $vehicule->marque }} {{ $vehicule->model }}</h4>
                                <div class="categories-review mb-4">
                                    <div class="me-3">{{ $vehicule->etoiles }} étoiles</div>
                                    <div class="d-flex justify-content-center text-secondary">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="fas fa-star{{ $i > $vehicule->etoiles ? ' text-body' : '' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">
                                        {{ number_format($vehicule->tarif, 2) }} DH/jour</h4>
                                </div>
                                <div class="row gy-2 gx-0 text-center mb-4">
                                    <div class="col-4 border-end border-white">
                                        <i class="fa fa-users text-dark"></i>
                                        <span class="text-body ms-1">{{ $vehicule->capacite }} places</span>
                                    </div>
                                    <div class="col-4 border-end border-white">
                                        <i class="fa fa-gas-pump text-dark"></i>
                                        <span class="text-body ms-1">{{ ucfirst($vehicule->type_carburant) }}</span>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-cogs text-dark"></i>
                                        <span class="text-body ms-1">{{ ucfirst($vehicule->transmission) }}</span>
                                    </div>
                                    <div class="col-4 border-end border-white">
                                        <i class="fa fa-calendar text-dark"></i>
                                        <span class="text-body ms-1">{{ $vehicule->annee }}</span>
                                    </div>
                                    <div class="col-4 border-end border-white">
                                        <i class="fa fa-road text-dark"></i>
                                        <span class="text-body ms-1">{{ number_format($vehicule->kilometrage) }}
                                            km</span>
                                    </div>
                                </div>
                                <a href="{{ route('login') }}"
                                    class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Réserver</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Car categories End -->





    <!-- Car Steps Start -->
    <div class="container-fluid steps py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-white mb-3">Processus<span class="text-primary">
                        RentFast</span></h1>
                <p class="mb-0 text-white">Découvrez la simplicité et la rapidité de notre processus de location de
                    voitures.
                    Avec RentFast, louer un véhicule devient un jeu d'enfant !
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="steps-item p-4 mb-4">
                        <h4>Entrez en contact</h4>
                        <p class="mb-0">Prenez contact avec nous facilement. Que ce soit par téléphone, e-mail,
                            ou en visitant notre agence, nous sommes toujours là pour vous aider.</p>
                        <div class="setps-number">01.</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="steps-item p-4 mb-4">
                        <h4>Choisissez une voiture</h4>
                        <p class="mb-0">Explorez notre flotte variée et trouvez la voiture qui correspond
                            parfaitement à vos besoins. Réservez votre véhicule en ligne en quelques clics.</p>
                        <div class="setps-number">02.</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="steps-item p-4 mb-4">
                        <h4>Profitez de la route</h4>
                        <p class="mb-0">Concentrez-vous sur votre voyage pendant que nous nous occupons du reste.
                            Vivez une expérience de location sans tracas !</p>
                        <div class="setps-number">03.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Car Steps End -->

        <!-- Début du blog -->
        <div id="blog" class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Blog Cental & <span
                            class="text-primary">Actualités</span></h1>
                    <p class="mb-0">Explorez notre section Blog Central & Actualités pour rester informé des
                        dernières nouvelles, tendances et mises à jour concernant nos services et le monde de la
                        location de véhicules.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('assets/img/blog-1.jpg')}}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="blog-content rounded-bottom p-4">
                                <div class="blog-date">30 déc. 2025</div>
                                <div class="blog-comment my-3">
                                    <div class="small"><span class="fa fa-user text-primary"></span><span
                                            class="ms-2">Martin.C</span></div>
                                    <div class="small"><span class="fa fa-comment-alt text-primary"></span><span
                                            class="ms-2">6 Commentaires</span></div>
                                </div>
                                <a href="#" class="h4 d-block mb-3">Location de voitures : comment vérifier les
                                    amendes ?</a>
                                <p class="mb-3">Pour vérifier les amendes liées à la location de votre voiture,
                                    consultez les informations fournies dans le contrat de location ou contactez
                                    directement notre service client. Nous vous aidons à obtenir les détails nécessaires
                                    et à régler toute amende en suspens rapidement et efficacement.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('assets/img/blog-2.jpg')}}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="blog-content rounded-bottom p-4">
                                <div class="blog-date">25 déc. 2025</div>
                                <div class="blog-comment my-3">
                                    <div class="small"><span class="fa fa-user text-primary"></span><span
                                            class="ms-2">Martin.C</span></div>
                                    <div class="small"><span class="fa fa-comment-alt text-primary"></span><span
                                            class="ms-2">6 Commentaires</span></div>
                                </div>
                                <a href="#" class="h4 d-block mb-3">Coût de location de voitures de sport et
                                    autres véhicules</a>
                                <p class="mb-3">La location de voitures de sport offre une expérience inégalée pour
                                    les amateurs de sensations fortes. Les prix varient en fonction du modèle et de la
                                    durée, allant de 500 à 1500 MAD par jour pour les voitures de luxe, tandis que les
                                    véhicules économiques commencent à partir de 150 MAD par jour. Profitez de nos
                                    offres spéciales pour un maximum de flexibilité et de confort.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('assets/img/blog-3.jpg')}}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="blog-content rounded-bottom p-4">
                                <div class="blog-date">27 déc. 2025</div>
                                <div class="blog-comment my-3">
                                    <div class="small"><span class="fa fa-user text-primary"></span><span
                                            class="ms-2">Martin.C</span></div>
                                    <div class="small"><span class="fa fa-comment-alt text-primary"></span><span
                                            class="ms-2">6 Commentaires</span></div>
                                </div>
                                <a href="#" class="h4 d-block mb-3">Documents requis pour la location de
                                    voiture</a>
                                <p class="mb-3">Pour louer une voiture chez nous, vous aurez besoin d’une pièce
                                    d’identité valide, d’un permis de conduire en cours de validité et d’une carte
                                    bancaire pour le dépôt de garantie. Ces documents garantissent un processus simple
                                    et rapide pour profiter de nos services.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du blog -->


        <!-- Début de la bannière -->
        <div class="container-fluid banner pb-5 wow zoomInDown" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="banner-item rounded">
                    <img src="{{ asset('assets/img/banner-1.jpg') }}" class="img-fluid rounded w-100" alt="">
                    <div class="banner-content">
                        <h2 class="text-primary">Louez votre voiture</h2>
                        <h1 class="text-white">Intéressé par la location ?</h1>
                        <p class="text-white">N'hésitez pas et envoyez-nous un message.</p>
                        <div class="banner-btn">

                            <a href="{{ route('insc') }}" class="btn btn-primary rounded-pill py-2 px-4">Get Started</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin de la bannière -->


        <!-- Team Start -->
        <div id="team" class="container-fluid team py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Centre <span class="text-primary"> de Support</span>
                        Client</h1>
                    <p class="mb-0">Notre équipe est là pour répondre à toutes vos questions et vous offrir une
                        assistance personnalisée.
                        Contactez-nous à tout moment pour une expérience de location de voiture sans souci !
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item p-4 pt-0">
                            <div class="team-img">
                                <img src="{{ asset('assets/img/team-1.jpg') }}" class="img-fluid rounded w-100" alt="Image">
                            </div>
                            <div class="team-content pt-4">
                                <h4>MARTIN DOE</h4>
                                <p>Profession</p>
                                <div class="team-icon d-flex justify-content-center">
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item p-4 pt-0">
                            <div class="team-img">
                                <img src="{{ asset('assets/img/team-2.jpg') }}" class="img-fluid rounded w-100" alt="Image">
                            </div>
                            <div class="team-content pt-4">
                                <h4>Issam lwafi</h4>
                                <p>Employe</p>
                                <div class="team-icon d-flex justify-content-center">
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item p-4 pt-0">
                            <div class="team-img">
                                <img src="{{ asset('assets/img/team-3.jpg') }}" class="img-fluid rounded w-100" alt="Image">
                            </div>
                            <div class="team-content pt-4">
                                <h4>ahmed masdik</h4>
                                <p>Technicien</p>
                                <div class="team-icon d-flex justify-content-center">
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item p-4 pt-0">
                            <div class="team-img">
                                <img src="{{ asset('assets/img/team-4.jpg') }}" class="img-fluid rounded w-100" alt="Image">
                            </div>
                            <div class="team-content pt-4">
                                <h4>karim boswafa</h4>
                                <p>Administrateur</p>
                                <div class="team-icon d-flex justify-content-center">
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

         <!-- Testimonial Start -->
    <div id="testimonial" class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Avis de <span class="text-primary"> nos clients</span></h1>
                <p class="mb-0">Découvrez ce que nos clients disent ! Lisez leurs témoignages et expériences pour
                    en savoir plus sur la qualité de nos services.
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($avis as $avi)
                    @if ($avi->client)
                        <!-- Check if client exists -->
                        <div class="testimonial-item">
                            <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i></div>
                            <div class="testimonial-inner p-4">
                                <img src="{{ asset('assets/avis/avis' . $avi->client->id . '.png') }}"
                                    class="img-fluid rounded-circle" alt="{{ $avi->client->user->nom ?? 'Client' }}"
                                    onerror="this.onerror=null; this.src='{{ asset('assets/img/testimonial-default.png') }}'">
                                <div class="ms-4">
                                    <h4>{{ $avi->client->user->nom ?? 'Anonyme' }}
                                        {{ $avi->client->user->prenom ?? '' }}</h4>
                                    <div class="d-flex text-primary">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i > $avi->note ? ' text-body' : '' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="border-top rounded-bottom p-4">
                                <p class="mb-0">{{ $avi->commentaire }}</p>
                                @if ($avi->created_at)
                                    <!-- Safely handle created_at -->
                                    <small class="text-muted">Posté le {{ $avi->created_at->format('d/m/Y') }}</small>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

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
                            <a href="#"><i class="fa fa-map-marker-alt me-2"></i> 123, Rue des Palmiers,
                                Marrakech</a>
                            <a href="mailto:Rentfast@gmail.com"><i class="fas fa-envelope me-2"></i>
                                Rentfast@gmail.com</a>
                            <a href="tel:05 99 99 99 98"><i class="fas fa-phone me-2"></i>05 99 99 99 98</a>
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
                    <!-- <div class="col-md-6 text-center text-md-end text-body">
                        Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>
                    </div> -->
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



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('reservationForm');

                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const reservation = {
                        id: Date.now().toString(), // Identifiant unique
                        nomClient: document.getElementById('nomClient').value,
                        emailClient: document.getElementById('emailClient').value,
                        telephoneClient: document.getElementById('telephoneClient').value,
                        modeleVehicule: document.getElementById('modeleVehicule').value,
                        dateDebut: document.getElementById('dateDebut').value,
                        dateFin: document.getElementById('dateFin').value,
                    };

                    // Validation des champs
                    if (!reservation.nomClient || !reservation.emailClient || !reservation.telephoneClient || !
                        reservation.modeleVehicule || !reservation.dateDebut || !reservation.dateFin) {
                        alert('Veuillez remplir tous les champs.');
                        return;
                    }

                    // Sauvegarder la réservation dans le localStorage
                    const demandesLocation = JSON.parse(localStorage.getItem('demandesLocation')) || [];
                    demandesLocation.push(reservation);
                    localStorage.setItem('demandesLocation', JSON.stringify(demandesLocation));

                    alert('Réservation effectuée avec succès !');
                    form.reset();
                });
            });
        </script>





        <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
