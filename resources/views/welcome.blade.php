<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia de Inglés</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Banner Carrusel -->
    <header class="carousel">
        <div class="carousel-wrapper">
            <div class="carousel-slide active">Bienvenidos</div>
            <div class="carousel-slide">Aprende Inglés</div>
            <div class="carousel-slide">Confiamos en tu Éxito</div>
        </div>
        <div class="carousel-indicators">
            <span class="indicator active" data-index="0"></span>
            <span class="indicator" data-index="1"></span>
            <span class="indicator" data-index="2"></span>
        </div>
    </header>
    
    <!-- División de Bienvenida -->
    <section class="welcome-section">
        <div class="welcome-container">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Academia" class="logo">
            <div class="welcome-text">
                <h1>Instituto de Lengua y Cultura</h1>
                <p>¡Inscríbete hoy y da el primer paso hacia el dominio del inglés!</p>
                <a href="#footer" class="btn">Contáctanos</a>
            </div>
        </div>
    </section>

    <!-- División de Cards -->
    <section class="cards-section">
        <div class="cards-container" id="cards-container">
            <!-- Las tarjetas se renderizan dinámicamente -->
            @foreach ($links as $card)
                <div class="card {{ $loop->iteration % 2 === 0 ? 'red' : 'blue' }}">
                    <h2>{{ $card->title }}</h2>
                    <p>{{ $card->content }}</p>
                </div>
            @endforeach
        </div>
        <button class="btn show-more" id="show-more">Mostrar más</button>
    </section>

    <!-- Footer -->
    <footer class="footer" id="footer">
        <div class="footer-content">
            <div class="footer-left">
                <h3>Contáctanos</h3>
            </div>
            
            <div class="footer-center">
                <p>Juan Pérez - +123456789</p>
                <p>María López - +987654321</p>
            </div>

            <div class="footer-right">
                <a href="#"><img src="{{ asset('images/facebook.svg') }}" alt="Facebook"></a>
                <a href="#"><img src="{{ asset('images/wpp-white.svg') }}" alt="Twitter"></a>
                <a href="#"><img src="{{ asset('images/instagram.svg') }}" alt="Instagram"></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Instituto de Lengua y Cultura. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
