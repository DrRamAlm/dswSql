<?php
include ("functions.php");
session_start();
setcookie("ckdatauser", null, -1);
session_destroy();
header("location: index.php");

/*
2.5.1. Lógica de negocio
1º) Eliminará la cookie ckdatauser
2º) Eliminará las variables de sesión del usuario.
3º) Redireccionará por get sin datos al script index.php

*/
