<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include("classes/client.php");
    session_start();
    if (isset($_SESSION["user"])) {

        $_SESSION["user"]->describe();
    }


    ?>

    <div class="endSesison"><a href="endsesion.php">Cerrar Sesión</a></div>

</body>

</html>

<?php
/*
2.4.1. Lógica de negocio
1º) Se tomará de la/s variable/s de sesión los datos del usuario (objeto clsCliente) y se
mostrarán. Además, se añadirá un enlace o botón denominado “Cerrar sesión” que hará
referencia al script endsesion.php.
2.4.2. Acciones/Casos de uso permitidos
a) Al hacer clic en “Cerrar sesión” redireccionará al script endsesion.php por el método
get. No es necesario aportar datos por get dado que endsesion.php procederá
automáticamente a eliminar la cookie y reiniciar o anular las variables de sesión (ver
apartado 2.5).
*/
?>