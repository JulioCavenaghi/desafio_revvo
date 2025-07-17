document.addEventListener('DOMContentLoaded', () => {
  const userName = document.querySelector('.user-name');
  const toggle   = document.querySelector('.dropdown-toggle');

  if (!toggle || !userName) return;

  toggle.addEventListener('click', function(e) {
    e.preventDefault();
    userName.classList.toggle('open');
  });

  document.addEventListener('click', function(e) {
    if (!userName.contains(e.target)) {
      userName.classList.remove('open');
    }
  });
});
