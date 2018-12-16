<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../helpers/helpers.php';
?>

    
    
    <div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <h1><strong><?=$_SESSION['userdata']['username']?></strong> | Perfil </h1><br />
        <?php if( !empty($cambios_realizados) ) {
                   if ($cambios_realizados==true) : ?>
                        <div class="alert alert-success" role="alert">
                            Cambios realizados satisfactoriamente.
                        </div>
                    <?php endif;
        }?>
        <form action="" method="POST" novalidate>
            <!-- NOMBRE -->
            <div class="form-group">
                <label for="username">Cambiar nombre</label>
                <input type="text" class="form-control <?=($errors['username'])?"is-invalid":""?>" id="username" name="username" aria-describedby="usernameHelp" placeholder="Nuevo nombre" value="<?=($username??'')?>">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 6 caracteres con números y letras.</small>
                <?php if( !empty($errors['username']) ) {
                    echo mostrarErroresFormulario($errors, 'username');
                } ?>
            </div><hr />
            <!-- EMAIL -->
            <div class="form-group">
                <label for="email">Cambiar email</label>
                <input type="email" class="form-control <?=($errors['email'])?"is-invalid":""?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Nuevo email"  value="<?=($email??'')?>">
                <?php if( !empty($errors['email']) ) {
                    echo mostrarErroresFormulario($errors, 'email');
                } ?>
            </div><hr />
            <!-- CONTRASEÑA -->
            <div class="form-group">
                <label for="password">Cambiar contraseña</label>
                <input type="password" class="form-control <?=($errors['password'])?"is-invalid":""?>" id="password" name="password" aria-describedby="passwordHelp" placeholder="Contraseña actual">
                <?php if( !empty($errors['password']) ) {
                    echo mostrarErroresFormulario($errors, 'password');
                } ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control <?=($errors['newpass'])?"is-invalid":""?>" id="newpass" name="newpass" placeholder="Nueva contraseña">
                <small id="passwordHelp" class="form-text text-muted">Debe tener 6 caracteres como mínimo.</small>
                <?php if( !empty($errors['newpass']) ) {
                    echo mostrarErroresFormulario($errors, 'newpass');
                } ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control <?=($errors['confirmpass'])?"is-invalid":""?>" id="confirmpass" name="confirmpass" placeholder="Repita su nueva contraseña">
                <?php if( !empty($errors['confirmpass']) ) {
                    echo mostrarErroresFormulario($errors, 'confirmpass');
                } ?>
            </div><br />
            
            <button type="submit" name="editar" class="btn btn-primary">Ejecutar cambios</button>
        </form>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>