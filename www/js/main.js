let $slider = $('.slider-item');
let currentSliderItem = 0;
let sliderInterval = setInterval(nextSlide, 5000);

let playing = true;
let $pausePlayButton = $('#pause-play');
let $nextButton = $('#next');
let $previousButton = $('#previous');

let $sliderPanel = $('.slider-panel');
let $indContainer = $('.slider-panel__navigation');
let $indItem = $('.indicator');

function nextSlide() {
    goToSlide(currentSliderItem + 1);
}

function prevSlide() {
    goToSlide(currentSliderItem - 1);
}

function goToSlide(n) {
    $($slider[currentSliderItem]).toggleClass('active');
    $($indItem[currentSliderItem]).attr('class', 'fa fa-circle indicator');

    currentSliderItem = ($slider.length + n) % $slider.length;

    $($slider[currentSliderItem]).toggleClass('active');
    $($indItem[currentSliderItem]).attr('class', 'fa fa-circle indicator');
}

function pauseSlideShow() {
    $pausePlayButton.attr('class', 'fa fa-play-circle');
    playing = false;
    clearInterval(sliderInterval);
}

function playSlideShow() {
    $pausePlayButton.attr('class', 'fa fa-pause');
    playing = true;
    sliderInterval = setInterval(nextSlide, 5000);
}

$sliderPanel.css('display', 'flex');

$pausePlayButton.on('click', () => {
    if (playing) pauseSlideShow();
    else playSlideShow();
});

$nextButton.on('click', () => {
    pauseSlideShow();
    nextSlide();
});

$previousButton.on('click', () => {
    pauseSlideShow();
    prevSlide();
});

$indContainer.on('click', (event) => {
    let target = event.target;

    if (target.classList.contains('indicator')) {
        pauseSlideShow();
        goToSlide(+target.getAttribute('data-slide-to'));
    }
});

//---------------------------------------------------------------------
$(document).on('keydown', keyNavigation);

function keyNavigation(event) {

    if (event.code === 'ArrowLeft') { //стрелка влево
        pauseSlideShow();
        prevSlide();
    }
    if (event.code === 'ArrowRight') { //стрелка вправо
        pauseSlideShow();
        nextSlide();
    }
    if (event.code === 'Space') { //пробел
        if (playing) pauseSlideShow();
        else playSlideShow();
    }
}

//---------------------------------------------------------------------
