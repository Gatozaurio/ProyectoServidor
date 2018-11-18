<?php
    require_once '../database/conexion.php';
    require_once '../setup.php';

    if( isset($_POST['login'])){
        $usernamesintrim = $_POST['username'];
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $errors = [];

        // Validaciones
        // Username:
        if( empty($username) ){
            $errors['username']['empty'] = "Debe introducir un nombre de usuario.";
            $username = null;
        }
        // Password:
        if( empty($password) ){
            $errors['password']['empty'] = "Debe introducir una contraseña.";
            $password = null;
        }

        if( empty($errors) ){
            // echo "login correcto";
            $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
            // lanza una consula contra la bd |conexión|consulta|
            $login = mysqli_query($db, $sql);

            if($login && mysqli_num_rows($login) == 1 ){

                $usuario = mysqli_fetch_assoc($login);

                if( password_verify($password, $usuario['password']) ){
                    // Se crea la sesión de usuario
                    session_start();
                    // Se asignan los datos de usuario a la sesión userdata
                    $_SESSION['userdata'] = $usuario;
                    header('Location: '.APP_URL);
                }else{
                    $errors['login']['password'] = "La contraseña no es correcta";
                }
            }else{
                $errors['login']['username'] = "El usuario es incorrecto";
            }

        }
    }

?>

<?php require_once 'login.view.php'; ?>