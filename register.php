<?php

/*
2.7.1. Lógica de negocio
1º) Tomará los datos recibidos por el método post. Si hay algún dato que falta, entonces
se redireccionará nuevamente a newuser.php informando del error de validación.
2º) Se creará el objeto clsCliente pasándole al constructor todos los datos recibidos. (Ver
apartado 3.2.3).
3º) Si al invocar el método IsError se confirma un error del objeto, entonces redireccionará
a newuser.php informando del código de error de validación oportuno que devolverá el
método GetError.
Nota: Tal como se indica en el apartado 3.2.3, uno de los errores posibles es que el
usuario ya exista.
4º) Si se ha superado todas las comprobaciones anteriores, entonces se entenderá que el
usuario se ha registrado correctamente (IsValidatedUser = true e IsError = false):
- Se creará la cookie ckdatauser con el customerid.
- Se creará la/s variable/s de sesión que estime oportuno, con al menos en una de ellas el
objeto clsCliente.
5º) Se redireccionará al script home.php por el método get sin parámetros

*/


?>