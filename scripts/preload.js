setTimeout(function() {
  const preloader = document.querySelector(".preloader");
  preloader.classList.add("hide-preloader");

  setTimeout(function() {
    $('.preloader').fadeOut('slow');
  }, 2000);
}, 2000);
