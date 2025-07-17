<?php
if (!isset($pageTitle)) {
    $pageTitle = 'LEO';
}

if (!isset($pageCss)) {
    $pageCss = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/desafio_revvo/assets/css/style.css">
    <?php foreach ($pageCss as $cssPath): ?>
        <link rel="stylesheet" href="<?= $cssPath ?>">
    <?php endforeach; ?>
</head>
<body>
    <header>
        <div class="logo" onclick="window.location.href='/desafio_revvo'">LEO</div>
        <div class="search-box">
            <input
            type="text"
            id="searchInput"
            placeholder="Pesquisar cursos..."
            >
        </div>
        <div class="user">
            <img src="/desafio_revvo/assets/images/avatar.jpg" alt="Usuário">
            <div class="user-name dropdown-toggle">
                Seja bem‑vindo, <p><strong>Julio Cavenaghi</strong>
                <i class="fas fa-chevron-down"></i>
                <ul class="dropdown-menu">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
            </div>
        </div>
    </header>
