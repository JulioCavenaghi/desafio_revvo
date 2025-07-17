<?php
  $id     = isset($_GET['id']) ? $_GET['id'] : null;
  $isEdit = $id ? true : false;
  $apiBase = 'http://localhost/desafio_revvo/api/index.php/courses';
  $pageTitle = $isEdit ? 'Editar Curso' : 'Novo Curso';
  $pageCss   = [
    '../../assets/css/course_form.css',
    '../../assets/css/style.css',
    '../../assets/css/modal.css',
  ];
  include __DIR__ . '/../includes/header.php';
?>

<section class="course-form">
  <h3><?= $isEdit ? 'Editar Curso' : 'Cadastro de Novo Curso' ?></h3>
  <div class="form-group">
    <label for="title">Título</label>
    <input type="text" id="title" placeholder="Título do curso">
  </div>
  <div class="form-group">
    <label for="image">Imagem (arquivo)</label>
    <input type="file" id="image" accept="image/*">
  </div>
  <div class="form-group">
    <label for="description">Descrição</label>
    <textarea id="description" placeholder="Descrição do curso..."></textarea>
  </div>
  <div class="form-group">
    <label for="url">URL do Curso</label>
    <input type="text" id="url" placeholder="https://...">
  </div>
  <div class="form-actions">
    <button id="submitBtn" class="btn-submit">
      <?= $isEdit ? 'Atualizar Curso' : 'Criar Curso' ?>
    </button>
    <a href="http://localhost/desafio_revvo/" class="btn-cancel">Cancelar</a>
  </div>
</section>

<script>
  const COURSE_FORM_CONFIG = {
    isEdit: <?= $isEdit ? 'true' : 'false' ?>,
    courseId: <?= $id ?? 'null' ?>,
    apiBase: '<?= $apiBase ?>'
  };
</script>
<script src="../../assets/js/course_form.js"></script>

<?php
  include __DIR__ . '/../includes/footer.php';
?>
