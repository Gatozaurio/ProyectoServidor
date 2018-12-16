<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../helpers/helpers.php';
?>

<div class="container">
    <div class="offset-2 col-5 pt-4 pb-4">
      <!-- Mostrar artistas -->
      <br /><h1 style="text-align: center;">Mis artistas</h1><hr />
        <?php if( mysqli_num_rows($result_artists) == 0): ?>
        <h5> No hay artistas. </h5>
        <?php endif; ?>
        <?php if( $result_artists ): ?>
            <ul class="list-group">
            <?php while($artist = mysqli_fetch_assoc($result_artists) ): ?>
            <?php
            $artist_name = $artist['name'];
            $concerts_query = "SELECT * FROM concerts WHERE user_id = $user_id and name = '$artist_name'; ";
            $result_concerts = mysqli_query($db, $concerts_query); 
            $numero_conciertos = mysqli_num_rows($result_concerts);
            if($numero_conciertos == 0){
                $evento = "Sin eventos";
                $numero_conciertos = '';
            } elseif($numero_conciertos == 1){
                $evento = "evento";
            } else{
                $evento = "eventos";
            }
            ?>
                <li class="list-group-item" style=" width: 180%;">
                    <?=$artist['name']?>
                    <a href="<?=APP_URL?>borrar_artista/?id=<?=$artist['id']?>" class="card-link float-right btn btn-danger" style="margin-left:22px;"><i class="fas fa-times-circle"></i></a>
                    <a href="<?=APP_URL?>editar_artista/?id=<?=$artist['id']?>" class="card-link float-right btn btn-info"><i class="fas fa-pen-square"></i></a>
                    <a href="<?=APP_URL?>conciertos_artista/?id=<?=$artist['id']?>" class="float-right btn btn-primary btn-block " style="margin-left:22; width: 100px;"><?=$numero_conciertos?> <?=$evento?></a>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>