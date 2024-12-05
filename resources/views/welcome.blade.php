<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia de Inglés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        #mainCarousel {
            max-height: 600px;
            /* El carousel ocupa el 100% de la altura de la pantalla */
            overflow: hidden;
        }

        #mainCarousel .carousel-inner {
            height: 100%;
            /* Asegura que el contenedor interno del carousel ocupe toda la altura */
        }

        #mainCarousel .carousel-inner img {   
            height: 100%;
            /* Ocupa toda la altura del contenedor */
           
            object-position: center;
            /* Centra la imagen vertical y horizontalmente */
        }

        #stickyHeader {
            background-color: white;
            box-shadow: none;
        }

        #stickyHeader.scrolled {
            background-color: #007bff;
            /* Cambia a azul */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra */
            transform: translateY(-5px);
            /* Efecto de movimiento */
        }
    </style>

</head>

<body class="bg-white">

    <!-- Header -->
    <header id="stickyHeader" class="bg-light shadow-sm p-3 position-sticky top-0 w-100"
        style="z-index: 1030; transition: all 0.3s ease-in-out;">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('image/logo.jpeg') }}" alt="Logo" width="60">
            </a>
            <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#navLinks">
                Menu
            </button>
        </div>
        <div class="collapse" id="navLinks">
            <div class="container mt-3">
                <nav class="d-flex flex-column gap-2">
                    <a href="#carouselSection" class="text-decoration-none text-primary">Carousel</a>
                    <a href="#collageSection" class="text-decoration-none text-primary">Collage</a>
                    <a href="#cardsSection" class="text-decoration-none text-primary">Cards</a>
                    <a href="#footer" class="text-decoration-none text-primary">Footer</a>
                </nav>
            </div>
        </div>
    </header>


    <!-- Carousel -->
    <section id="carouselSection" class="mt-1 mb-5">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Imágenes del carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('image/image1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/image2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/image3.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <!-- Sección Collage -->
    <section id="collageSection" class="mt-5 pt-5">
        <div class="container">
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <div class="position-relative">
                        <img src="{{ asset('image/image4.jpg') }}" class="img-fluid rounded shadow-lg"
                            alt="Collage Image 1">
                        <img src="{{ asset('image/image5.jpg') }}"
                            class="position-absolute top-50 start-50 translate-middle img-thumbnail shadow-lg"
                            style="width: 80%;" alt="Collage Image 2">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">Explore Our Academy</h2>
                    <p class="lead">Join our English Academy and improve your skills with the best instructors and
                        resources.</p>
                    <a href="#cardsSection" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Cards -->
    <section id="cardsSection" class="mt-5">
        <div class="container">
            <h2 class="text-center mb-4">Articles</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($links as $article)
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body"
                            style="background-color: {{ $loop->index % 2 == 0 ? '#ffcccc' : '#cce5ff' }}">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->content }}</p>
                            <a href="{{ route('view.page', $article->id) }}" class="btn btn-outline-primary">Read
                                More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer id="footer" class="bg-dark text-light mt-5 py-4">
        <div class="container d-flex">
            <div class="col-md-6">
                <img src="{{ asset('image/footer-image.jpg') }}" class="img-fluid rounded shadow-lg" alt="Footer Image">
            </div>
            <div class="col-md-6">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li>Email: info@englishacademy.com</li>
                    <li>Phone: +123 456 7890</li>
                    <li>Address: 123 Academy Street, City</li>
                </ul>
                <div class="d-flex gap-3">
                    <a href="#" class="text-light">Facebook</a>
                    <a href="#" class="text-light">Twitter</a>
                    <a href="#" class="text-light">Instagram</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.getElementById("stickyHeader");
    
            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) {
                    header.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                }
            });
        });
    </script>

</body>

</html>