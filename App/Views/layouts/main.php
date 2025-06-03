<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calistenia Portugal</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- CSS Customizado -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <!-- Menu de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black py-3">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/assets/img/logo.png" alt="Logo Calistenia PT" width="120">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/eventos"><i class="bi bi-calendar-event"></i> Eventos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/torneios"><i class="bi bi-trophy"></i> Torneios</a></li>
                    <li class="nav-item"><a class="nav-link" href="/atletas"><i class="bi bi-people"></i> Atletas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/artigos"><i class="bi bi-journal-text"></i> Artigos</a></li>
                </ul>
                
                <div class="d-flex gap-2">
                    <?php if(isset($_SESSION['user'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> <?= $_SESSION['user']['name'] ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="/perfil"><i class="bi bi-person"></i> Perfil</a></li>
                                <li><a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i> Sair</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="/login" class="btn btn-outline-light"><i class="bi bi-box-arrow-in-right"></i> Entrar</a>
                        <a href="/registar" class="btn btn-warning"><i class="bi bi-person-add"></i> Registar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container my-5">
        <?= isset($content) ? $content : ''; ?>
    </main>

    <!-- Bootstrap JS e Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    <!-- Scripts Customizados -->
    <script src="/assets/js/main.js"></script>
</body>
</html>