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

  setInterval(() => goToSlide(current + 1), 5000);

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

  function createCourseCard(course) {
    const card = document.createElement('div');
    card.classList.add('card');

    const actions = document.createElement('div');
    actions.classList.add('actions');
    const deleteIcon = document.createElement('i');
    deleteIcon.classList.add('fas', 'fa-trash');
    deleteIcon.title = 'Excluir curso';
    deleteIcon.addEventListener('click', () => deleteCourse(course.id));
    actions.appendChild(deleteIcon);
    card.appendChild(actions);

    const img = document.createElement('img');
    img.src = `data:image/png;base64,${course.image}`;
    img.alt = course.title;
    card.appendChild(img);

    const content = document.createElement('div');
    content.classList.add('card-content');
    content.innerHTML = `
      <h4>${course.title}</h4>
      <p>${course.description}</p>
      <a href="src/views/course_form.php?id=${course.id}" class="btn">
        Ver Curso
      </a>
    `;
    card.appendChild(content);

    return card;
  }

  function deleteCourse(id) {
    if (!confirm('Tem certeza que deseja excluir este curso?')) return;
    fetch(`http://localhost/desafio_revvo/api/index.php/courses/${id}`, {
      method: 'DELETE'
    })
      .then(res => {
        if (!res.ok) throw new Error('Erro ao deletar');
        loadCourses();
      })
      .catch(err => console.error(err));
  }

  function loadCourses() {
    const grid = document.getElementById('coursesGrid');
    fetch('http://localhost/desafio_revvo/api/index.php/courses')
      .then(res => res.json())
      .then(courses => {
        Array.from(grid.querySelectorAll('.card:not(.add)'))
             .forEach(el => el.remove());
        const addCard = grid.querySelector('.card.add');
        courses.forEach(course => {
          const card = createCourseCard(course);
          grid.insertBefore(card, addCard);
        });
      })
      .catch(err => console.error('Erro ao carregar cursos:', err));
  }

  document.addEventListener('DOMContentLoaded', loadCourses);

})();