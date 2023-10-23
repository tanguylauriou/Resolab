document.addEventListener('DOMContentLoaded', function () {
    const mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true, // Pour un défilement continu
        autoplay: {
            delay: 3000, // Définit l'intervalle d'autoslide en millisecondes (3 secondes)
        },
    });
});
