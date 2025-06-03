<?php include 'layouts/main.php'; ?>

<?php ob_start(); ?>
<div class="container mt-5">
    <h1 class="text-warning mb-4"><?= $title ?></h1>
    
    <div class="row g-4">
        <?php foreach ($featured_events as $event): ?>
        <div class="col-md-4">
            <div class="card bg-dark border-warning h-100">
                <div class="card-body">
                    <h3><?= htmlspecialchars($event['title']) ?></h3>
                    <p class="text-muted">
                        <i class="bi bi-geo-alt"></i> <?= $event['location'] ?><br>
                        <i class="bi bi-calendar"></i> <?= date('d/m/Y', strtotime($event['date'])) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>