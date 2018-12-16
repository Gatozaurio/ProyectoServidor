<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../helpers/helpers.php'; 
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <h1>Editar concierto</h1><br />
        <form action="" method="POST" novalidate>
            <!-- NOMBRE -->
            <div class="form-group">
                <label for="nombreconcierto">Cambiar nombre</label>
                <input type="text" class="form-control <?=($errors['nombreconcierto'])?"is-invalid":""?>" id="nombreconcierto" name="nombreconcierto" aria-describedby="nombreconciertoHelp" placeholder="Nuevo nombre del artista">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 2 caracteres.</small>
                <?php if( !empty($errors['nombreconcierto']) ) {
                    echo mostrarErroresFormulario($errors, 'nombreconcierto');
                } ?>
            </div>
            <!-- UBICACIÓN -->
            <div class="form-group">
                <label for="ubicacionconcierto">Cambiar ubicación</label>
                <input type="text" class="form-control <?=($errors['ubicacionconcierto'])?"is-invalid":""?>" id="ubicacionconcierto" name="ubicacionconcierto" aria-describedby="ubicacionconciertoHelp" placeholder="Nueva ubicación del concierto">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 4 caracteres.</small>
                <?php if( !empty($errors['ubicacionconcierto']) ) {
                    echo mostrarErroresFormulario($errors, 'ubicacionconcierto');
                } ?>
            </div>
            <!-- PRECIO -->
            <div class="form-group">
                <label for="precioconcierto">Cambiar precio</label>
                <input type="text" class="form-control <?=($errors['precioconcierto'])?"is-invalid":""?>" id="precioconcierto" name="precioconcierto" aria-describedby="precioconciertoHelp" placeholder="Nuevo precio en números">
                <?php if( !empty($errors['precioconcierto']) ) {
                    echo mostrarErroresFormulario($errors, 'precioconcierto');
                } ?>
            </div>
            <!-- DESCRIPCIÓN -->
            <button type="submit" name="editar" class="btn btn-primary">Ejecutar cambios</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>