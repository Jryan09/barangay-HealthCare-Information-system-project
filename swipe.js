document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
        },
    });

    function nextForm() {
        swiper.slideNext();
    }
});