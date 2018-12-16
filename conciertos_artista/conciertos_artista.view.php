<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
?>
<div class="container">
    <br /><h1 style="text-align: center;">Conciertos de <?=$artist_name?></h1><hr />
    <?php if( mysqli_num_rows($result_concerts) == 0): ?>
        <br /><h5 style="text-align: center;"> No hay conciertos de <?=$artist_name?> de momento :( </h5><br />
    <?php endif; ?>
    <div id="my_lists" class="row">
    <?php while($mis_conciertos = mysqli_fetch_assoc($result_concerts)): ?>
        <div class="col-sm">
            <div class="card-vertical-margins">
                <div class="card" style="width: 19rem;">
                    <h5 class="card-header"><?=$mis_conciertos['name']?></h5>
                    <div class="card-body">
                        <p class="card-text"><?=$mis_conciertos['location']."<br>"?>
                        <?php if ($mis_conciertos['price']==0) : ?>
                            GRATIS
                        <?php else: ?>
                            <?=$mis_conciertos['price']?>€
                        <?php endif; ?></p>
                        <a href="<?=APP_URL?>concierto/?id=<?=$mis_conciertos['id']?>" class="card-link btn btn-primary">Ver concierto</a>
                        <a href="<?=APP_URL?>borrar_concierto/?id=<?=$mis_conciertos['id']?>" class="card-link float-right btn btn-danger"><i class="fas fa-times-circle"></i></a>
                        <a href="<?=APP_URL?>editar_concierto/?id=<?=$mis_conciertos['id']?>" class="card-link float-right btn btn-info"><i class="fas fa-pen-square"></i></a>   
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
</div>
<?php require_once '../includes/footer.php'; ?>