console.log(document.querySelector('.recipe-grid'));
$('.recipe-grid').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true
  });