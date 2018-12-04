<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../helpers/helpers.php'; 
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
                <?php if( !empty($errors['nombreconcierto']) ) {
                    echo mostrarErroresFormulario($errors, 'nombreconcierto');
                } ?>
            </div>
            <!-- UBICACIÓN -->
            <div class="form-group">
                <label for="ubicacionconcierto">Ubicación</label>
                <input type="text" class="form-control <?=($errors['ubicacionconcierto'])?"is-invalid":""?>" id="ubicacionconcierto" name="ubicacionconcierto" aria-describedby="ubicacionconciertoHelp" placeholder="Introduce la ubicación del concierto" value="<?=($listname??'')?>">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 4 caracteres con números y letras minúsculas.</small>
                <?php if( !empty($errors['ubicacionconcierto']) ) {
                    echo mostrarErroresFormulario($errors, 'ubicacionconcierto');
                } ?>
            </div>
            <!-- PRECIO -->
            <div class="form-group">
                <label for="precioconcierto">Precio</label>
                <input type="text" class="form-control <?=($errors['precioconcierto'])?"is-invalid":""?>" id="precioconcierto" name="precioconcierto" aria-describedby="precioconciertoHelp" placeholder="Introduce el precio en números" value="<?=($listname??'')?>">
                <?php if( !empty($errors['precioconcierto']) ) {
                    echo mostrarErroresFormulario($errors, 'precioconcierto');
                } ?>
            </div>
            <!-- DESCRIPCIÓN -->
            <button type="submit" name="nuevo_concierto" class="btn btn-primary">Crear concierto</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>