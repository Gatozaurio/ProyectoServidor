<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
?>

<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <h2>Información del concierto</h2>
        <hr>
        <?php if( $datos_concierto ): ?>
        <?php var_dump($datos_concierto)?>
        <h3><strong>Artista:</strong> <?=$datos_concierto['name']?></h3>
        <h3><strong>Ubicación:</strong> <?=$datos_concierto['location']?></h3>
        <h3><strong>Precio:</strong> <?=$datos_concierto['price']?></h3>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>