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
            $ip = $_SERVER['REMOTE_ADDR'];
            $browser = $_SERVER['HTTP_USER_AGENT'];

            if($login && mysqli_num_rows($login) == 1 ){

                $usuario = mysqli_fetch_assoc($login);

                if( password_verify($password, $usuario['password']) ){
                    // Manda una consulta con los datos de la conexión exitosa
                    $query = "INSERT into logins VALUES(NULL, '$username', '$ip', '$browser', 'OK', NOW() )";
                    mysqli_query($db, $query);
                    // Se crea la sesión de usuario
                    session_start();
                    // Se asignan los datos de usuario a la sesión userdata
                    $_SESSION['userdata'] = $usuario;
                    header('Location: '.APP_URL);
                }else{
                    // Manda una consulta avisando de la conexión errónea por haber introducido una contraseña incorrecta
                    $query = "INSERT into logins VALUES(NULL, '$username', '$ip', '$browser', 'wrong pass', NOW() )";
                    mysqli_query($db, $query);
                    $errors['login']['password'] = "La contraseña no es correcta";
                }
            }else{
                // Manda una consulta avisando de la conexión errónea por haber introducido un usuario incorrecto
                $query = "INSERT into logins VALUES(NULL, '$username', '$ip', '$browser', 'wrong username', NOW() )";
                mysqli_query($db, $query);
                $errors['login']['username'] = "El usuario es incorrecto";
            }

        }
    }

?>

<?php require_once 'login.view.php'; ?>