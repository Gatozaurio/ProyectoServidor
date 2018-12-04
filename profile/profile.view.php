<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../helpers/helpers.php';
?>

    <h1><strong><?=$_SESSION['userdata']['username']?></strong> | Perfil</h1>
    
    <div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <form action="" method="POST" novalidate>
        <div class="form-group">
                <label for="username">Cambiar nombre</label>
                <input type="text" class="form-control <?=($errors['username'])?"is-invalid":""?>" id="username" name="username" aria-describedby="usernameHelp" placeholder="Nuevo nombre" value="<?=($username??'')?>">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 6 caracteres con números y letras.</small>
                <?php if( !empty($errors['username']) ) {
                    echo mostrarErroresFormulario($errors, 'username');
                } ?>
            </div>
            
            <button type="submit" name="editar" class="btn btn-primary">Ejecutar cambios</button>
        </form>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>