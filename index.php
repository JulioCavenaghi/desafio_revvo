<?php
include __DIR__ . '/src/includes/header.php';
include __DIR__ . '/src/includes/modal.php';

?>

<section class="slider">
    <div class="slide active">
        <div class="overlay">
            <h2>Título do Slide 1</h2>
            <p>Descrição do primeiro slide.</p>
            <a href="#" class="btn">Ver Curso</a>
        </div>
    </div>
    <div class="slide">
        <div class="overlay">
            <h2>Título do Slide 2</h2>
            <p>Descrição do segundo slide.</p>
            <a href="#" class="btn">Ver Curso</a>
        </div>
    </div>
    <div class="slide">
        <div class="overlay">
            <h2>Título do Slide 3</h2>
            <p>Descrição do terceiro slide.</p>
            <a href="#" class="btn">Ver Curso</a>
        </div>
    </div>

    <div class="arrow prev"><i class="fas fa-chevron-left"></i></div>
    <div class="arrow next"><i class="fas fa-chevron-right"></i></div>
    <div class="dots">
        <span class="dot active" data-index="0"></span>
        <span class="dot" data-index="1"></span>
        <span class="dot" data-index="2"></span>
    </div>
</section>

<section class="courses">
    <h3>Meus Cursos</h3>
    <div class="grid" id="coursesGrid">
        <div class="card add">
            <a href="http://localhost/desafio_revvo/src/views/course_form.php">
                <i class="fas fa-folder-plus add-icon"></i>
                <p>Adicionar curso
            </a></p>
        </div>
    </div>
</section>

<script src="/desafio_revvo/assets/js/main.js"></script>


<?php
include __DIR__ . '/src/includes/footer.php';
?>
