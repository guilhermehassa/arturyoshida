const header_nav = document.querySelector('.header_nav');
const header_nav__toggle = document.querySelector('.header_nav__toggle');
const headerNavLinks = document.querySelectorAll('.header_nav a');

console.log('header_nav__toggle', header_nav__toggle);
console.log('header_nav', header_nav);
if (header_nav__toggle) {
  header_nav__toggle.addEventListener('click', () => {
    header_nav.classList.toggle('header_nav--open');
    header_nav__toggle.classList.toggle('header_nav__toggle--open');
  });
  
  headerNavLinks.forEach(link => {
    link.addEventListener('click', () => {
      if(!header_nav.classList.contains('header_nav--open')) {
        return;
      }
      header_nav.classList.remove('header_nav--open');
      header_nav__toggle.classList.remove('header_nav__toggle--open');
    });
  });


}

const testimonialsSwiper = new Swiper('.testimonials_swiper', {
  slidesPerView: 'auto',
  loop: true,
  spaceBetween: 20,
  speed: 3000, 
  autoplay: {
    delay: 2000,
    disableOnInteraction: true,
  },
});