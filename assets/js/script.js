$(document).ready(function(){
  $('.slick').slick({
    arrows: true,
centerMode: true,
centerPadding: '60px',
slidesToShow: 3,
slidesToScroll: 1,
variableWidth: true,
lazyLoad: 'ondemand',
responsive: [
  {
    breakpoint: 1447,
    settings: {
      arrows: true,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 3,
      slideToScroll:1
    }
  },
  {
    breakpoint: 820,
    settings: {
      arrows: true,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 3
    }
  },
  {
    breakpoint: 480,
    settings: {
      arrows: true,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 1
    }
  }
]
});

});