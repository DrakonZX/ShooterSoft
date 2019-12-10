var slider = $('#lightSlider').lightSlider({
    controls: false,
    loop:true,
    auto:true,
    item:4,
    pager:false,
});
$('#goToPrevSlide').on('click', function () {
    slider.goToPrevSlide();
});
$('#goToNextSlide').on('click', function () {
    slider.goToNextSlide();
});
