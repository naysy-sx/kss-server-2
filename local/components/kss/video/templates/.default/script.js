
(() => {
    function initVideoSlider(params) {
        new Swiper('#' + params.sliderId, {
            slidesPerView: params.slidesPerView,
            spaceBetween: 50,
            pagination: {
                el: '.videos-pagination',
                clickable: true,
            },
            autoplay: params.autoplay ? {
                delay: params.autoplaySpeed,
                disableOnInteraction: false,
            } : false,
            breakpoints: {
              0: {
                slidesPerView: 1,
              },

              1024: {
                slidesPerView: 2,
                spaceBetween: 30,
              },

              1440: {
                slidesPerView: 2,
                spaceBetween: 50,
              },
            },
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (typeof Swiper !== 'undefined') {
            // biome-ignore lint/complexity/noForEach: <explanation>
            Object.keys(window.videoSliderParams || {}).forEach((key) => {
                initVideoSlider(window.videoSliderParams[key]);
            });
        } else {
            console.warn('Swiper is not loaded');
        }
    });
})();

