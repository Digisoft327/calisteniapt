<?php 
/** @var array $data */
?>

<?php ob_start(); ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold">Eventos de Calistenia</h1>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="/eventos/novo" class="btn btn-warning">
                <i class="bi bi-plus-circle"></i> Submeter Evento
            </a>
        <?php endif; ?>
    </div>
    
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    
    <?php if(!empty($data['events'])): ?>
        <div class="row g-4">
            <?php foreach($data['events'] as $event): ?>
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title fw-bold"><?= htmlspecialchars($event['title']) ?></h5>
                                <span class="badge bg-warning text-dark">Evento</span>
                            </div>
                            <p class="card-text text-muted">
                                <i class="bi bi-geo-alt"></i> <?= htmlspecialchars($event['location']) ?><br>
                                <i class="bi bi-calendar"></i> <?= date('d/m/Y H:i', strtotime($event['date'])) ?>
                            </p>
                            <p class="card-text"><?= nl2br(htmlspecialchars(substr($event['description'], 0, 200))) ?>...</p>
                            <a href="/evento/<?= $event['id'] ?>" class="btn btn-sm btn-outline-dark">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <div class="alert alert-info">
                <h4>Nenhum evento disponível no momento</h4>
                <p>Fique atento às próximas atualizações ou submeta o seu próprio evento!</p>
                <a href="/eventos/novo" class="btn btn-info mt-2">Submeter Evento</a>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $content = ob_get_clean(); ?>