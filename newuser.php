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
    include("functions.php");
    setcookie("ckdatauser", false, -1);
    if (isset($_GET["error"])) {
        session_start();
        showErrors($_SESSION["error"]);
    }
    showRegisterform();

    ?>
</body>

</html>


<?php

/*
2.6.1. Lógica de negocio
1º) Eliminará la cookie ckdatauser.
2º) Se mostrará el formulario de recogida de datos que estime oportuno (en base al
modelo de datos proporcionado) correspondiente a los campos de la tabla customer:
Usuario (username), 
Contraseña (password), 
Nombre (name), Apellido 1 (firstlastname),
Apellido 2 (secondlastname), Fecha de nacimiento (birthdaydate), Calle (streetdirection),
N.º (streetnumber), CP (provincecode), Municipio (cityid), Provincia (provinceid), país
(countryid), Teléfono 1 (telephone1), teléfono 2 (telephone2), email.
Los componentes del formulario relativos a la ciudad, provincia o país previamente han de
cargarse de los datos obtenidos de la base de datos. Es decir, el dominio de datos posible
viene definido por las tablas city, country y province. El usuario no ha de escribirlos, sino
seleccionar un valor permitido. (Ejemplo: combobox).
3º) Si se detecta por paso de parámetros get un error, se añadirá el mensaje al formulario
anterior.
2.6.2. Acciones/Casos de uso permitidos
a) Al hacer clic en “Enviar” redireccionará al script register.php por método post.
b) Al hacer clic en “Cancelar” se redireccionará al script index.php por método get. No es
necesario enviar parámetros por get.
*/


?>