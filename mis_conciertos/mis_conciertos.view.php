<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
?>
<div class="container">
    <div id="my_lists" class="row">
    <?php while($mis_conciertos = mysqli_fetch_assoc($conciertos_obtenidos)): ?>
        <div class="col-sm">
            <div id="card_list" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$mis_conciertos['name']?></h5>
                    <p class="card-text">
                        <?=$mis_conciertos['location']."<br>"?>
                        <?=$mis_conciertos['price']."€"?>
                    </p>
                    <a href="<?=APP_URL?>concierto/?id=<?=$mis_conciertos['id']?>" class="card-link btn btn-primary">Ver concierto</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
</div>
<?php require_once '../includes/footer.php'; ?>