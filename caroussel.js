document.addEventListener('DOMContentLoaded', function () {
    const mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true, // Pour un défilement continu
        autoplay: {
            delay: 3000, // Définit l'intervalle d'autoslide en millisecondes (3 secondes)
        },
    });
});
