<!doctype html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="description"
        content="A growing collection of ready to use components for the CSS framework Bootstrap 5">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('image/favicon.png')}}">
    <meta name="author" content="Holger Koenemann">
    <meta name="generator" content="Eleventy v2.0.0">
    <meta name="HandheldFriendly" content="true">
    <title>ILC - Aprende Inglés</title>
    <link rel="stylesheet" href="{{ asset('css/theme.min.css')}}">

    <style>
        /* inter-300 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: local(''),
                url('/fonts/inter-v12-latin-300.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('/fonts/inter-v12-latin-300.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: local(''),
                url('/fonts/inter-v12-latin-500.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('/fonts/inter-v12-latin-500.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local(''),
                url('/fonts/inter-v12-latin-700.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('/fonts/inter-v12-latin-700.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }
    </style>

</head>

<body data-bs-spy="scroll" data-bs-target="#navScroll" style="background-color: #a8c2fa !important">

    <nav id="navScroll" class="navbar navbar-expand-lg navbar-light fixed-top" tabindex="0">
        <div class="container">
            <a class="navbar-brand pe-4 fs-4" href="{{route('home')}}">
                <a class="navbar-brand pe-4 fs-4" href="{{route('home')}}">
                    <img src="{{asset('image/ilc.png')}}" alt="ILC | Instituto de Lengua y Cultura" height="50px">
                </a>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#services" aria-label="Brings you to the frontpage">
                            Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus">
                            Compromiso
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">
                            Páginas
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="w-100 overflow-hidden bg-gray-100" id="top">

            <div class="container position-relative">
                <div class="col-12 col-lg-8 mt-0 h-100 position-absolute top-0 end-0 bg-cover" data-aos="fade-left"
                    style="background-image: url({{asset('image/webp/interior11.webp')}});">

                </div>
                <div class="row">

                    <div class="col-lg-7 py-vh-6 position-relative" data-aos="fade-right">
                        <h1 class="display-1 fw-bold mt-5">Aprende inglés de la manera mas fácil!</h1>
                        <p class="lead">¡Domina el inglés y abre las puertas a tu futuro! 🌍 Inscríbete hoy y alcanza
                            tus metas con nosotros.</p>
                        <a href="#services" class="btn btn-dark btn-xl shadow me-3 rounded-0 my-5">Conocer más</a>
                    </div>



                </div>
            </div>

        </div>

        <div class="py-vh-5 w-100 overflow-hidden" id="services">
            <div class="container">
                <div class="row d-flex justify-content-end">
                    <div class="col-lg-8" data-aos="fade-down">
                        <h2 class="display-6">Descubre por qué aprender inglés con nosotros es la mejor decisión para tu futuro.
                            ¡Aquí tienes tres razones clave!</h2>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <span class="h5 fw-lighter">01.</span>
                        <h3 class="py-5 border-top border-dark">Clases dinámicas y personalizadas para cada nivel.</h3>
                        <p>En nuestro instituto, las clases están diseñadas para adaptarse a tus necesidades y objetivos. 
                            Con docentes calificados y estrategias innovadoras, aprender inglés será una experiencia práctica y divertida.</p>
                        <a href="#" class="link-fancy">¡Conoce más!
                        </a>
                    </div>
        
                    <div class="col-md-6 col-lg-4 py-vh-4 pb-0" data-aos="fade-up" data-aos-delay="400">
                        <span class="h5 fw-lighter">02.</span>
                        <h3 class="py-5 border-top border-dark">Materiales y recursos exclusivos para maximizar tu aprendizaje.</h3>
                        <p>Te proporcionamos acceso a libros, plataformas digitales y contenido interactivo para que puedas 
                            practicar en cualquier momento y lugar. ¡La mejor forma de alcanzar tus metas!</p>
                        <a href="#" class="link-fancy">¡Conoce más!
                        </a>
                    </div>
        
                    <div class="col-md-6 col-lg-4 py-vh-6 pb-0" data-aos="fade-up" data-aos-delay="600">
                        <span class="h5 fw-lighter">03.</span>
                        <h3 class="py-5 border-top border-dark">Aprender inglés con nosotros abre puertas a nuevas oportunidades.</h3>
                        <p>Ya sea para viajar, estudiar o trabajar, dominar el inglés es una herramienta esencial para alcanzar 
                            tus sueños. ¡Comienza hoy y construye un futuro lleno de posibilidades!</p>
                        <a href="#" class="link-fancy">¡Conoce más!
                        </a>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="py-vh-4 bg-gray-100 w-100 overflow-hidden" id="aboutus">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <div class="row gx-5 d-flex">
                            <div class="col-md-11">
                                <div class="shadow ratio ratio-16x9 rounded bg-cover bp-center align-self-end"
                                    data-aos="fade-right"
                                    style="background-image: url({{asset('image/webp/people15.webp')}});--bs-aspect-ratio: 50%;">
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <div class="shadow ratio ratio-1x1 rounded bg-cover mt-5 bp-center float-end"
                                    data-aos="fade-up"
                                    style="background-image: url({{asset('image/webp/interior42.webp')}});">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-12 shadow ratio rounded bg-cover mt-5 bp-center" data-aos="fade-left"
                                    style="background-image: url({{asset('image/webp/people4.webp')}});--bs-aspect-ratio: 150%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="py-5 border-top border-dark" data-aos="fade-left">¡Bienvenidos al Instituto de Lengua y Cultura!</h3>
                        <p data-aos="fade-left" data-aos-delay="200">
                            Somos una institución dedicada a brindar una educación de calidad en el aprendizaje del idioma inglés.
                            Con años de experiencia y un equipo de docentes altamente calificados, hemos ayudado a cientos de estudiantes 
                            a alcanzar sus metas académicas, profesionales y personales.
                        </p>
                        <p data-aos="fade-left" data-aos-delay="300">
                            En el Instituto de Lengua y Cultura, combinamos tecnología, materiales exclusivos y metodologías innovadoras 
                            para garantizar un aprendizaje efectivo y significativo. Nuestro compromiso es acompañarte en cada paso del camino, 
                            impulsándote a alcanzar el éxito.
                        </p>
                        <p>
                            <a href="#" class="link-fancy link-dark" data-aos="fade-left" data-aos-delay="400">Conoce más sobre nosotros
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="position-relative overflow-hidden w-100 bg-light" id="gallery">
            <div class="container-fluid">
                <div class="row overflow-scroll">
                    <div class="col-12">
                        <div class="row vw-100 px-0 py-vh-5 d-flex align-items-center scrollx">
                            <!-- Iterar sobre la variable links para crear una card por cada elemento -->
                            @foreach ($links as $link)
                                <div class="col-md-2" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 200 }}">
                                    <div class="card shadow rounded">
                                        <div class="card-body">
                                            <a class="link-fancy" href="{{route('view.page', $link->id)}}" style="text-decoration: none"><h5 class="card-title">{{ $link->title }}</h5></a>
                                            <p class="card-text text-truncate">{{ Str::limit($link->content, 100)  }}</p>
                                            <!-- Aquí podrías agregar más elementos como botones o enlaces si es necesario -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="small py-vh-3 w-100 overflow-hidden">
            <div class="container">
                <div class="row">
                    <!-- Primera columna -->
                    <div class="col-md-6 col-lg-4 border-end" data-aos="fade-up">
                        <div class="d-flex">
                            <div class="flex-shrink-0 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                    class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                </svg>
                            </div>
                            <div class="flex-grow-1 ps-3">
                                <h3 class="h5 my-2">Metodología Innovadora</h3>
                                <p>Nuestro enfoque de enseñanza combina técnicas modernas con práctica constante, asegurando que
                                    nuestros estudiantes dominen el idioma de manera efectiva y dinámica.</p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Segunda columna -->
                    <div class="col-md-6 col-lg-4 border-end" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex">
                            <div class="flex-shrink-0 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                    class="bi bi-card-checklist" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </div>
                            <div class="flex-grow-1 ps-3">
                                <h3 class="h5 my-2">Programas Personalizados</h3>
                                <p>Ofrecemos cursos adaptados a las necesidades de cada estudiante, desde niveles básicos hasta
                                    avanzados, con horarios flexibles para tu conveniencia.</p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Tercera columna -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="d-flex">
                            <div class="flex-shrink-0 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                    class="bi bi-window-sidebar" viewBox="0 0 16 16">
                                    <path d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v2H1V3a1 1 0 0 1 1-1h12zM1 13V6h4v8H2a1 1 0 0 1-1-1zm5 1V6h9v7a1 1 0 0 1-1 1H6z" />
                                </svg>
                            </div>
                            <div class="flex-grow-1 ps-3">
                                <h3 class="h5 my-2">Recursos Digitales</h3>
                                <p>Acceso a una sistema virtual con materiales didácticos, feedback de docentes y
                                    herramientas que complementan el aprendizaje.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>

    <footer>
        <div class="container small border-top">
            <div class="row py-5 d-flex justify-content-between">

                <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-layers-half" viewbox="0 0 16 16">
                        <path
                            d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z" />
                    </svg>
                    <address class="text-secondary mt-3">
                        <strong>Instituto de Lengua y Cultura</strong><br>
                        Jr. Los Pinos 268<br>
                        Jr. Ucayali 996<br>
                        <abbr title="Phone">P:</abbr>
                        996260029
                    </address>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
                    <h3 class="h6 mb-3">Niveles</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" aria-current="page" href="#">Para Niños</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" href="#">Para jovenes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" href="#">Para adultos</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
                    <h3 class="h6 mb-3">Cursos</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" aria-current="page" href="#">Ingles Básico</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" href="#">Ingles Pre-Intermedio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" href="#">Ingles Intermedio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" href="#">Ingles Intermedio Alto</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" href="#">Avanzado</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 p-5">
                    <h3 class="h6 mb-3">Subpages</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" aria-current="page" href="{{route('login')}}">Login</a>
                            <a class="nav-link link-secondary ps-0" aria-current="page" href="https://wa.me/51996260029?text=Quiero%20aprender%20ngles%20con%20ustedes">Whatsapp</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container text-center py-3 small">Todos los derechos reservados <a href="{{route('home')}}" class="link-fancy"
                target="_blank">Academy.com®</a>
        </div>
    </footer>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script>
        AOS.init({
   duration: 800, // values from 0 to 3000, with step 50ms
 });
    </script>

    <script>
        let scrollpos = window.scrollY
  const header = document.querySelector(".navbar")
  const header_height = header.offsetHeight

  const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
  const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

  window.addEventListener('scroll', function() {
    scrollpos = window.scrollY;

    if (scrollpos >= header_height) { add_class_on_scroll() }
    else { remove_class_on_scroll() }

    console.log(scrollpos)
  })
    </script>

</body>

</html>