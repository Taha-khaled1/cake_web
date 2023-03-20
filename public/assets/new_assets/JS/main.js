/****************************************************  start swiper  **********************************************************/
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 50,
    },
  },
});
$('footer p').html(function (i, h) {
  return h.replace(/&nbsp;/g, '');
});
$('footer p').each(function () {
  const $this = $(this);
  if ($this.html().replace(/\s|&nbsp;/g, '').length === 0)
    $this.remove();
});
/****************************************************  end swiper  **********************************************************/




