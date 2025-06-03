<?php 
/** @var array $data */
?>

<?php ob_start(); ?>
<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item"><a href="/eventos">Eventos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($data['event']['title']) ?></li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h1 class="fw-bold mb-0"><?= htmlspecialchars($data['event']['title']) ?></h1>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <span class="badge bg-warning text-dark">Evento</span>
                            <span class="text-muted ms-2">
                                <i class="bi bi-calendar"></i> <?= date('d/m/Y H:i', strtotime($data['event']['date'])) ?>
                            </span>
                        </div>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $data['event']['organizer_id']): ?>
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Editar</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-4">
                        <p class="lead">
                            <i class="bi bi-geo-alt"></i> <?= htmlspecialchars($data['event']['location']) ?>
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h4 class="fw-bold mb-3">Descrição do Evento</h4>
                        <p><?= nl2br(htmlspecialchars($data['event']['description'])) ?></p>
                    </div>
                    
                    <div class="mb-4">
                        <h4 class="fw-bold mb-3">Organizador</h4>
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-person fs-4"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-0 fw-bold"><?= htmlspecialchars($data['event']['organizer_type']) ?></p>
                                <p class="mb-0 text-muted">ID: <?= $data['event']['organizer_id'] ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button class="btn btn-lg btn-warning">Participar no Evento</button>
                        <button class="btn btn-outline-dark">Compartilhar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="fw-bold mb-0">Eventos Relacionados</h5>
                </div>
                <div class="card-body">
                    <?php if(!empty($data['relatedEvents'])): ?>
                        <?php foreach($data['relatedEvents'] as $event): ?>
                            <div class="mb-3">
                                <a href="/evento/<?= $event['id'] ?>" class="text-decoration-none text-dark">
                                    <h6 class="fw-bold mb-1"><?= htmlspecialchars($event['title']) ?></h6>
                                </a>
                                <p class="text-muted small mb-1">
                                    <i class="bi bi-calendar"></i> <?= date('d/m/Y', strtotime($event['date'])) ?>
                                </p>
                                <p class="small mb-0"><?= nl2br(htmlspecialchars(substr($event['description'], 0, 100))) ?>...</p>
                            </div>
                            <hr class="my-2">
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-3">
                            <p class="text-muted">Nenhum evento relacionado encontrado</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="fw-bold mb-0">Localização</h5>
                </div>
                <div class="card-body">
                    <div class="bg-light rounded" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                        <p class="text-center text-muted">
                            <i class="bi bi-map fs-1"></i><br>
                            Mapa de localização<br>
                            <small><?= htmlspecialchars($data['event']['location']) ?></small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>