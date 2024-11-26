const slides = document.querySelectorAll('.carousel-slide');
const indicators = document.querySelectorAll('.indicator');
let currentIndex = 0;

// Función para actualizar el carrusel
function updateCarousel(index) {
    // Actualizar las clases activas
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
    indicators.forEach((indicator, i) => {
        indicator.classList.toggle('active', i === index);
    });
    // Mover el contenedor
    const wrapper = document.querySelector('.carousel-wrapper');
    wrapper.style.transform = `translateX(-${index * 100}%)`;
}

// Avanzar automáticamente cada 5 segundos
function autoAdvance() {
    currentIndex = (currentIndex + 1) % slides.length;
    updateCarousel(currentIndex);
}
let interval = setInterval(autoAdvance, 5000);

// Control manual mediante los indicadores
indicators.forEach((indicator) => {
    indicator.addEventListener('click', () => {
        clearInterval(interval); // Detener el autoavance temporalmente
        currentIndex = parseInt(indicator.getAttribute('data-index'), 10);
        updateCarousel(currentIndex);
        interval = setInterval(autoAdvance, 5000); // Reiniciar el autoavance
    });
});
