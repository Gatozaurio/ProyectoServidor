<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../helpers/helpers.php'; 
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <h1>Editar nota</h1>
        <form action="" method="POST" novalidate>
            <!-- Texto -->
            <div class="form-group">
                <input type="text" class="form-control <?=($errors['note'])?"is-invalid":""?>" id="note" name="note" aria-describedby="noteHelp" placeholder="Nuevo texto">
                <?php if( !empty($errors['note']) ) {
                    echo mostrarErroresFormulario($errors, 'note');
                } ?>
            </div>
            <button type="submit" name="editar" class="btn btn-primary">Ejecutar cambios</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>