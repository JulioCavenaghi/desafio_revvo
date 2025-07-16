<?php
?><!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <title>LEO - Home</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>
        <?php include __DIR__ . '/includes/modal.php'; ?>
        <header>
            <div class="logo">LEO</div>
            <div class="search-box">
                <input type="text" placeholder="Pesquisar cursos...">
                <i class="fas fa-search"></i>
            </div>
            <div class="user">
                <img src="../assets/images/avatar.jpg" alt="Usuário">
                <div class="user-name">
                Seja bem‑vindo, <p><strong>Julio Cavenaghi</strong>
                <i class="fas fa-chevron-down dropdown-toggle"></i>
                <ul class="dropdown-menu">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
                </div>
            </div>
        </header>

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
            <div class="grid">
                <div class="card">
                    <img src="../assets/images/course.jpg" alt="Curso">
                    <div class="card-content">
                    <h4>Pellentesque Malesuada</h4>
                    <p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue.</p>
                    <a href="#" class="btn">Ver Curso</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../assets/images/course.jpg" alt="Curso">
                    <div class="card-content">
                    <h4>Pellentesque Malesuada</h4>
                    <p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue.</p>
                    <a href="#" class="btn">Ver Curso</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../assets/images/course.jpg" alt="Curso">
                    <div class="card-content">
                    <h4>Pellentesque Malesuada</h4>
                    <p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue.</p>
                    <a href="#" class="btn">Ver Curso</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../assets/images/course.jpg" alt="Curso">
                    <div class="card-content">
                    <h4>Pellentesque Malesuada</h4>
                    <p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue.</p>
                    <a href="#" class="btn">Ver Curso</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../assets/images/course.jpg" alt="Curso">
                    <div class="card-content">
                    <h4>Pellentesque Malesuada</h4>
                    <p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue.</p>
                    <a href="#" class="btn">Ver Curso</a>
                    </div>
                </div>
                <div class="card">
                    <span class="badge">Novo</span>
                    <img src="../assets/images/course.jpg" alt="Curso">
                    <div class="card-content">
                    <h4>Pellentesque Malesuada</h4>
                    <p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue.</p>
                    <a href="#" class="btn">Ver Curso</a>
                    </div>
                </div>
                <div class="card add">
                    <i class="fas fa-folder-plus add-icon"></i>
                    <span>Adicionar Curso</span>
                </div>
            </div>
        </section>

        <footer>
            <div class="footer-container">
            <div>
                <div class="footer-logo">LEO</div>
                <p>Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            </div>
            <div class="footer-col">
                <h5>Contato</h5>
                <p>(21) 98765-3434<br>contato@leolearning.com</p>
            </div>
            <div class="footer-col social-icons">
                <h5>Redes Sociais</h5>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </div>
            </div>
            <div class="copyright">
            Copyright 2017 – All right reserved.
            </div>
        </footer>

        <script src="../assets/js/main.js"></script>

    </body>
</html>