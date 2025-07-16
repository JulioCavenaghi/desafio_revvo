(function() {
  const slides = document.querySelectorAll('.slider .slide');
  const prevBtn = document.querySelector('.slider .prev');
  const nextBtn = document.querySelector('.slider .next');
  const dots = document.querySelectorAll('.slider .dot');
  let current = 0;

  function goToSlide(n) {
    slides[current].classList.remove('active');
    dots[current].classList.remove('active');
    current = (n + slides.length) % slides.length;
    slides[current].classList.add('active');
    dots[current].classList.add('active');
  }

  prevBtn.addEventListener('click', () => goToSlide(current - 1));
  nextBtn.addEventListener('click', () => goToSlide(current + 1));
  dots.forEach(dot => {
    dot.addEventListener('click', () => goToSlide(parseInt(dot.dataset.index, 10)));
  });

  // Avanço automático a cada 5s
  setInterval(() => goToSlide(current + 1), 5000);

  // Dropdown usuário
  const userName = document.querySelector('.user-name');
  const toggle   = document.querySelector('.dropdown-toggle');

  toggle.addEventListener('click', function(e) {
    e.preventDefault();
    userName.classList.toggle('open');
  });

  document.addEventListener('click', function(e) {
    if (!userName.contains(e.target)) {
      userName.classList.remove('open');
    }
  });
})();