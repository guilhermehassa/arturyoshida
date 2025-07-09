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

document.querySelectorAll('[id="inputTel"]').forEach(function(input) {
  input.addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g, '');

    if (v.length > 11) v = v.slice(0, 11);

    // Monta a máscara dinamicamente
    if (v.length > 6) {
      // 9 dígitos: (99) 99999-9999
      // 8 dígitos: (99) 9999-9999
      v = v.replace(/^(\d{2})(\d{4,5})(\d{0,4})/, '($1) $2-$3');
    } else if (v.length > 2) {
      v = v.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
    } else if (v.length > 0) {
      v = v.replace(/^(\d*)/, '($1');
    }

    // Permite apagar normalmente
    if (v.endsWith('-')) v = v.slice(0, -1);
    if (v.endsWith(' ')) v = v.slice(0, -1);

    e.target.value = v;
  });
});

document.addEventListener('wpcf7submit', function(event) {
  var form = event.target;
  var telInputs = form.querySelectorAll('[id="inputTel"]');
  var valid = true;

  telInputs.forEach(function(input) {
    var digits = input.value.replace(/\D/g, '');
    if (digits.length < 8) {
      valid = false;
      input.classList.add('wpcf7-not-valid');
      if (!input.nextElementSibling || !input.nextElementSibling.classList.contains('tel-error')) {
        var span = document.createElement('span');
        span.className = 'tel-error';
        span.style.color = 'red';
        span.textContent = 'Telefone inválido. Deve conter pelo menos 8 dígitos.';
        input.parentNode.insertBefore(span, input.nextSibling);
      }
    } else {
      input.classList.remove('wpcf7-not-valid');
      if (input.nextElementSibling && input.nextElementSibling.classList.contains('tel-error')) {
        input.nextElementSibling.remove();
      }
    }
  });

  if (!valid) {
    event.preventDefault();
  }
}, true);

