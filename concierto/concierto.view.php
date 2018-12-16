<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../helpers/helpers.php';
?>

<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <!-- Mostrar concierto -->
        <h2 style="text-align: center;"><strong><?php echo $datos_concierto['name'];?></strong> </h2>
        <hr>
        <?php if( $datos_concierto ): ?>
            <h5><strong>Ubicación:</strong> <?=$datos_concierto['location']?></h5>
            <h5><strong>Precio:</strong>
            <?php if ($datos_concierto['price']==0) : ?>
                GRATIS</h5>
            <?php else: ?>
                <?=$datos_concierto['price']?>€</h5>
            <?php endif; ?>
        <?php endif; ?>
        <h5><strong>Notas:</strong></h5>
        <form action="" method="POST" novalidate>
            <div class="input-group">
                <input type="text" class="form-control <?=($errors['note'])?"is-invalid":""?>" id="note" name="note" placeholder="Escribir una nueva nota">
                <button type="submit" name="addnote" class="btn btn-primary">Añadir</button>
                <?php if( !empty($errors['note']) ) {
                    echo mostrarErroresFormulario($errors, 'note');
                } ?>
            </div><br />
        </form>
        <!-- Mostrar notas -->
        <?php if( mysqli_num_rows($result_notes) == 0): ?>
        <h5> Sin notas </h5>
        <?php endif; ?>
        <?php if( $result_notes ): ?>
            <ul class="list-group">
            <?php while($note = mysqli_fetch_assoc($result_notes) ): ?>
                <li class="list-group-item">
                    <?=$note['text']?>
                    <a href="<?=APP_URL?>borrar_nota/?id=<?=$note['id']?>" class="card-link float-right btn btn-danger" style="margin-left:22px;"><i class="fas fa-times-circle"></i></a>
                    <a href="<?=APP_URL?>editar_nota/?id=<?=$note['id']?>" class="card-link float-right btn btn-info"><i class="fas fa-pen-square"></i></a>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>