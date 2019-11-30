$(document).ready(function() {
  $("#content-slider").lightSlider({
    auto: true,
    item: 5,
    loop: true,
    controls: true,
    speed: 250,
    pause: 3000,
    keyPress: true,
    mode: 'slide',
    responsive: [{
      breakpoint: 767,
      settings: {
        item: 3,
        slideMove: 1,
        slideMargin: 6,
      }
    }, {
      breakpoint: 481,
      settings: {
        item: 1,
        slideMove: 1
      }
    }]
  });

});
