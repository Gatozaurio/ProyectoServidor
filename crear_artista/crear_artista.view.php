<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../helpers/helpers.php'; 
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <h1>Añadir artista</h1><br />
        <form action="" method="POST" novalidate>
            <!-- NOMBRE -->
            <div class="form-group">
                <label for="nombreartista">Nombre del artista</label>
                <input type="text" class="form-control <?=($errors['nombreartista'])?"is-invalid":""?>" id="nombreartista" name="nombreartista" aria-describedby="nombreartistaHelp" placeholder="Introduce el nombre del artista">
                <small id="nombreartistaHelp" class="form-text text-muted">Debe tener como mínimo 2 caracteres.</small>
                <?php if( !empty($errors['nombreartista']) ) {
                    echo mostrarErroresFormulario($errors, 'nombreartista');
                } ?>
            </div>
            <button type="submit" name="nuevo_artista" class="btn btn-primary">Añadir artista</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>