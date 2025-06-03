<?php 
/** @var array $data */
use App\Core\Helpers;
?>

<?php ob_start(); ?>
<!-- Hero Section -->
<section class="hero-section bg-dark text-light py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Calistenia Portugal</h1>
                <p class="lead mb-4">O portal oficial da comunidade de calistenia portuguesa. Encontre eventos, torneios, artigos e conecte-se com atletas de todo o país.</p>
                <div class="d-flex gap-3">
                    <a href="/eventos" class="btn btn-warning btn-lg px-4 py-2">Explorar Eventos</a>
                    <a href="/registar" class="btn btn-outline-light btn-lg px-4 py-2">Juntar-se</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="/assets/img/hero-image.png" alt="Atleta de Calistenia" class="img-fluid rounded-3 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Featured Events -->
<section class="py-5 bg-light text-dark">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Eventos em Destaque</h2>
            <a href="/eventos" class="btn btn-outline-dark">Ver Todos</a>
        </div>
        
        <div class="row g-4">
            <?php if(!empty($data['featuredEvents'])): ?>
                <?php foreach($data['featuredEvents'] as $event): ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-img-top bg-secondary" style="height: 200px; background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('/assets/img/event-placeholder.jpg'); background-size: cover; background-position: center;"></div>
                        <div class="card-body">
                            <span class="badge bg-warning text-dark mb-2">Evento</span>
                            <h5 class="card-title"><?= htmlspecialchars($event['title']) ?></h5>
                            <p class="card-text">
                                <i class="bi bi-geo-alt"></i> <?= htmlspecialchars($event['location']) ?><br>
                                <i class="bi bi-calendar"></i> <?= date('d/m/Y H:i', strtotime($event['date'])) ?>
                            </p>
                            <p class="card-text text-truncate"><?= htmlspecialchars($event['description']) ?></p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="/evento/<?= $event['id'] ?>" class="btn btn-sm btn-outline-dark">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">Nenhum evento disponível no momento. Volte em breve!</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Upcoming Tournaments -->
<section class="py-5 bg-dark text-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Próximos Torneios</h2>
            <a href="/torneios" class="btn btn-outline-light">Ver Todos</a>
        </div>
        
        <div class="row g-4">
            <?php if(!empty($data['upcomingTournaments'])): ?>
                <?php foreach($data['upcomingTournaments'] as $tournament): ?>
                <div class="col-md-4">
                    <div class="card h-100 bg-secondary text-light border-warning">
                        <div class="card-body">
                            <span class="badge bg-warning text-dark mb-2">Torneio</span>
                            <h5 class="card-title"><?= htmlspecialchars($tournament['name']) ?></h5>
                            <p class="card-text">
                                <i class="bi bi-trophy"></i> <?= htmlspecialchars($tournament['category']) ?><br>
                                <i class="bi bi-calendar"></i> <?= date('d/m/Y', strtotime($tournament['start_date'])) ?> - <?= date('d/m/Y', strtotime($tournament['end_date'])) ?>
                            </p>
                            <p class="card-text"><?= htmlspecialchars($tournament['description']) ?></p>
                        </div>
                        <div class="card-footer bg-dark border-warning">
                            <a href="/torneio/<?= $tournament['id'] ?>" class="btn btn-sm btn-warning">Participar</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="alert alert-warning">Nenhum torneio agendado no momento. Fique atento às atualizações!</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Recent Articles -->
<section class="py-5 bg-light text-dark">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Artigos Recentes</h2>
            <a href="/artigos" class="btn btn-outline-dark">Ver Todos</a>
        </div>
        
        <div class="row g-4">
            <?php if(!empty($data['recentArticles'])): ?>
                <?php foreach($data['recentArticles'] as $article): ?>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                            <p class="card-text text-muted">
                                <small>Publicado em: <?= date('d/m/Y', strtotime($article['created_at'])) ?></small>
                            </p>
                            <div class="card-text">
                                <?= substr(strip_tags($article['content']), 0, 150) ?>...
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="/artigo/<?= $article['id'] ?>" class="btn btn-sm btn-outline-dark">Ler Artigo</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">Nenhum artigo disponível no momento.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-warning text-dark">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Faça parte da comunidade de calistenia em Portugal</h2>
        <p class="lead mb-4">Registe-se para participar em eventos, competir em torneios e aceder a conteúdos exclusivos.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="/registar" class="btn btn-dark btn-lg px-4 py-2">Criar Conta</a>
            <a href="/eventos" class="btn btn-outline-dark btn-lg px-4 py-2">Ver Eventos</a>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>