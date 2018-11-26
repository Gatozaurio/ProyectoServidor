<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <h1>Crear nuevo concierto</h1>
        <form action="" method="POST" novalidate>
            <!-- NOMBRE -->
            <div class="form-group">
                <label for="nombreconcierto">Nombre del concierto</label>
                <input type="text" class="form-control <?=($errors['nombreconcierto'])?"is-invalid":""?>" id="nombreconcierto" name="nombreconcierto" aria-describedby="nombreconciertoHelp" placeholder="Introduce el nombre del concierto" value="<?=($listname??'')?>">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 4 caracteres con números y letras minúsculas.</small>
                <?php if( !empty($errors['nombreconcierto']) ): ?> 
                <div class="invalid-feedback">
                    <?php foreach ($errors['nombreconcierto'] as $error): ?>
                        <?=$error?><br/>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <!-- UBICACIÓN -->
            <div class="form-group">
                <label for="ubicacionconcierto">Ubicación</label>
                <input type="text" class="form-control <?=($errors['ubicacionconcierto'])?"is-invalid":""?>" id="ubicacionconcierto" name="ubicacionconcierto" aria-describedby="ubicacionconciertoHelp" placeholder="Introduce la ubicación del concierto" value="<?=($listname??'')?>">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 4 caracteres con números y letras minúsculas.</small>
            </div>
            <!-- PRECIO -->
            <div class="form-group">
                <label for="precioconcierto">Precio</label>
                <input type="text" class="form-control <?=($errors['precioconcierto'])?"is-invalid":""?>" id="precioconcierto" name="precioconcierto" aria-describedby="precioconciertoHelp" placeholder="Introduce el precio en números" value="<?=($listname??'')?>">
            </div>
            <!-- DESCRIPCIÓN -->
            <div class="form-group">
                <label for="listdesc">Descripción</label>
                <textarea class="form-control" id="listdesc" name="listdesc" rows="3"><?=($listdesc??'')?></textarea>
            </div>
            <button type="submit" name="nuevo_concierto" class="btn btn-primary">Crear concierto</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>