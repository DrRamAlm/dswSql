
<?php
/*
2.3.1. Lógica de negocio
1º) Si existe la cookie ckdatauser tomará de ella los datos del customerid.
2º) Si no existe la cookie ckdatauser, tomará los datos del username y password que
reciba por el método post.
3º) Una vez disponga de los datos, bien sea por las anteriores condiciones 1º) o 2º),
procederá a intentar crear el objeto clsCliente pasándole al constructor el username y
password o pasandole al constructor el customerid (Ver apartado 3.2.2 y 3.2.4).
4º) Si con el método IsError se confirma un error en el objeto clsCliente entonces se
obtendrá el código de error con GetCodError y se redireccionará por get enviando el error
a index.php.
5º) Se deberá comprobar con el método IsValidatedUser si la validación ha sido
satisfactoria. 
Si ha sido satisfactoria, entonces creará la cookie ckdatauser (si no existe) con el dato del
customerid y se creará la/s variables de sesión que estime oportuno asignando al menos
a alguna de ellas el objeto clsCliente con los datos del cliente.
De lo contrario, si la validación no ha sido correcta, se eliminará la cookie ckdatauser y se
redireccionará por método get a index.php informando del código de error oportuno.
Nota: Para más información de la clase clsCliente ver apartado 3.2.

*/


?>