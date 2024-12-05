<!DOCTYPE html>
<html lang="en">
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
    <title>{{$page->title}}</title>
    <link rel="stylesheet" href="{{ asset('css/theme.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
<body data-bs-spy="scroll" data-bs-target="#navScroll">
    <nav id="navScroll" class="navbar navbar-expand-lg navbar-light fixed-top" tabindex="0">
        <div class="container">
            <a class="navbar-brand pe-4 fs-4" href="{{route('home')}}">
                <img src="{{asset('image/ilc.png')}}" alt="ILC | Instituto de Lengua y Cultura" height="50px">
            </a>
            @if (!empty($menu))
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @include('layouts.menu', ['menu' => $menu])
            @endif
        </div>
    </nav>

    @if (!empty($sections))
        @include('layouts.elements', ['sections' => $sections])
    @endif

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
                    <h3 class="h6 mb-3">Todos aprenden:</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" aria-current="page" href="#">Para Niños</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" href="#">Para Jovenes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-secondary ps-0" href="#">Para Adultos</a>
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
                            <a class="nav-link link-secondary ps-0" aria-current="page" href="https://wa.me/51996260029?text=Quiero%20aprender%20ingles%20con%20ustedes" target="_blank">Whatsapp</a>
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
