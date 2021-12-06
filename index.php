<?php
session_start();
include("functions.php");
//var_dump($_SESSION);

if (isset($_COOKIE["ckdatauser"])) {
    header("location: validateuser.php");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["error"])) {
        showErrors($_SESSION["error"]);
    }

    showLoginForm();

    ?>
</body>

</html>
<?php
/*
2.2.1. Lógica de negocio
1º) Si existe la cookie ckdatauser entonces redireccionará al script denominado
validateuser.php por método get. En este caso, no será necesario enviar datos por get,
dado que validateuser.php detectará la cookie y procederá a validar el usuario (ver
apartado 2.3.).
2º) Si no existe la cookie ckdatauser entonces mostrará un formulario en el que se
solicitará el username y password seguido de un botón denominado “Entrar”. En la parte
inferior se mostrará un enlace denominado “Nueva cuenta” que hará referencia al script
newuser.php.
Además, si se detecta algún parámetro por método GET se entenderá que está recibiendo
un código de error procedente de validateuser.php y se añadirá a la vista el mensaje de
error de validación que crea oportuno.
2.2.2. Acciones/Casos de uso permitidos
a) Al hacer clic en “Entrar” enviará los datos por método post al script validateuser.php.
b) Al hacer clic en “Nueva cuenta” redireccionará por método get a newuser.php. No será
necesario enviar datos por get.

*/
?>