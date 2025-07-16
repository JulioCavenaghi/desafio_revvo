<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Exemplo de Modal</title>
  <link rel="stylesheet" href="assets/css/modal.css" />
  <script defer src="assets/js/modal.js"></script>
</head>
<body>

  <div class="modal-overlay">
    <div class="modal">
      <button class="modal__close" aria-label="Fechar modal">&times;</button>
      <div class="modal__header">
        <img src="assets/images/header-modal.jpg" alt="Ilustração topo do modal">
      </div>
      <div class="modal__body">
        <h2 class="modal__title">EGESTAS TORTOR VULPUTATE</h2>
        <p class="modal__text">
          Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.
          Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui. Cras
        </p>
        <a href="#" class="modal__btn">INSCREVA‑SE</a>
      </div>
    </div>
  </div>

  <script>
    document.querySelector('.modal__close').addEventListener('click', function(){
      document.querySelector('.modal-overlay').style.display = 'none';
    });
  </script>
</body>
</html>