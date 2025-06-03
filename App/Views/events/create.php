<?php 
/** @var array $data */
?>

<?php ob_start(); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h1 class="fw-bold mb-0">Submeter Novo Evento</h1>
                </div>
                <div class="card-body">
                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    
                    <form method="POST" action="/eventos">
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Título do Evento</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Descrição</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label fw-bold">Localização</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label fw-bold">Data e Hora</label>
                                <input type="datetime-local" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tipo de Organizador</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="organizer_type" id="organizer_club" value="club" checked>
                                <label class="form-check-label" for="organizer_club">
                                    Clube/Associação
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="organizer_type" id="organizer_athlete" value="athlete">
                                <label class="form-check-label" for="organizer_athlete">
                                    Atleta Individual
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning btn-lg">Submeter Evento</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>