<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Cental - Car Rent Website Template')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="keywords" content="@yield('keywords', '')">
        <meta name="description" content="@yield('description', '')">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lassets/ib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

        @stack('styles') <!-- Pour injecter des styles spécifiques depuis d'autres vues -->
    </head>


<body>


    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i>RentFast</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ url('/index') }}" class="nav-item nav-link">Acceuil</a>
                        <a href="{{ url('/index#propos') }}" class="nav-item nav-link">À propos</a>
                        <a href="{{ url('/index#Services') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ url('/index#blog') }}" class="nav-item nav-link">Blog</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ url('/index#caractéristiques') }}" class="dropdown-item">caractéristiques</a>
                                <a href="{{ url('/index#Catégories') }}" class="dropdown-item">Notre véhicules</a>
                                <a href="{{ url('/index#team') }}" class="dropdown-item">Notre equipe</a>
                                <a href="{{ url('/index#testimonial') }}" class="dropdown-item">Témoignage</a>
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

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contactez-nous</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Contact</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-primary mb-3">Contactez-nous</h1>

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
                                    <p class="mb-0">123, Rue des Palmiers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fas fa-envelope fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-0"><a type="mailto:rentfast@gmail.com " class="__cf_email__" >rentfast@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Telephone Fix</h4>
                                    <p class="mb-0">+212 576310956</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fab fa-firefox-browser fa-2x"></i>
                                </div>
                                <div>
                                    <h4><a>Telephone</a></h4>
                                    <p class="mb-0">+212 60000555</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5 rounded">
                        <h4 class="text-primary mb-4">envoyez-nous Votre message</h4>
                        <form id="contactForm">
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                        <label for="name">Votre Nom</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                        <label for="email">Votre Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                        <label for="phone">numero de TelePhone</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="project" name="project" placeholder="Project">
                                        <label for="project">Votre Projet</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                        <label for="subject">Titre</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 160px" required></textarea>
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
                <div class="col-12 col-xl-1 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex flex-xl-column align-items-center justify-content-center">
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-0 me-0 me-xl-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-5 bg-light rounded">
                        <div class="bg-white rounded p-4 mb-4">
                            <h4 class="mb-3">Kénitra</h4>
                            <div class="d-flex align-items-center flex-shrink-0 mb-3">
                                <p class="mb-0 text-dark me-2">Adresse:</p><i class="fas fa-map-marker-alt text-primary me-2"></i><p class="mb-0"> zone industrielle Rami n°129, 14090</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i class="fa fa-phone-alt text-primary me-2"></i><p class="mb-0">05 37 37 52 18</p>
                            </div>
                        </div>
                        <div class="bg-white rounded p-4 mb-4">
                            <h4 class="mb-3">Grand Casablanca</h4>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0 text-dark me-2">Adresse:</p><i class="fas fa-map-marker-alt text-primary me-2"></i><p class="mb-0"> rue Omar Slaoui, 1°et, Grand Casablanca</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i class="fa fa-phone-alt text-primary me-2"></i><p class="mb-0"> 05 22 48 75 22</p>
                            </div>
                        </div>
                        <div class="bg-white rounded p-4 mb-0">
                            <h4 class="mb-3">Marrakech</h4>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0 text-dark me-2">Adresse:</p><i class="fas fa-map-marker-alt text-primary me-2"></i><p class="mb-0">123, Rue des Palmiers</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i class="fa fa-phone-alt text-primary me-2"></i><p class="mb-0">05 99 99 99 98</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="rounded">
                        <iframe class="rounded w-100"
                        style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.34589057912!2d-8.020345!3d31.629472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafeef02a8451ad%3A0x0!2s123%20Rue%20des%20Palmiers%2C%20Marrakech!5e0!3m2!1sen!2sma!4v1694259649153!5m2!1sen!2sma"
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
                        <div class="footer-item">
                            <h4 class="text-white mb-4">À propos de nous</h4>
                            <p class="mb-3">Notre priorité est d'assurer un service client exceptionnel
                                tout en proposant une flotte diversifiée qui s'adapte aux besoins variés de nos clients.</p>
                        </div>
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
                        <a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> info@example.com</a>
                        <a href="tel:+012 345 67890"><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                        <a href="tel:+012 345 67890" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                        <div class="d-flex">
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-facebook-f text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-twitter text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-instagram text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-0" href=""><i class="fab fa-linkedin-in text-white"></i></a>
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
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>RentFast</a>, Tous droits réservés.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js')}}"></script>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const data = {
                id: Date.now().toString(),
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value,
                timestamp: new Date().toISOString()
            };

            let messages = JSON.parse(localStorage.getItem('customerServiceMessages')) || [];
            messages.push(data);
            localStorage.setItem('customerServiceMessages', JSON.stringify(messages));

            alert('Votre message a été envoyé avec succès !');
            this.reset();
        });

        // Affichage des messages existants
        function displayMessages() {
            const messages = JSON.parse(localStorage.getItem('customerServiceMessages')) || [];
            const messageList = document.getElementById('messageList');
            messageList.innerHTML = '';

            messages.forEach(msg => {
                const div = document.createElement('div');
                div.classList.add('message-item');
                div.innerHTML = `
                    <h5>${msg.name} - ${new Date(msg.timestamp).toLocaleString()}</h5>
                    <p>${msg.message}</p>
                `;
                messageList.appendChild(div);
            });
        }

        // Charger les messages au démarrage
        displayMessages();
    </script>
    <a href="index.html#service-client" class="btn btn-secondary">Retour au Service Client</a>



</body>
</html>
