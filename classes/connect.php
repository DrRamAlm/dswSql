<?php


/*

Esta clase permitirá centralizar los datos del cliente a modo de entidad de la tabla
customer.
Deberá implementar como mínimo los métodos y atributos que se indican a continuación.
Podrá añadir los métodos y atributos adicionales que necesite, como por ejemplo para
acceder a los valores de los atributos privados, destructor, etc.
Para el acceso a datos, esta clase deberá instanciar a objetos de la clase clsConnection y
llevar a cabo el paradigma de acceso a datos; abrir conexión, ejecutar y cerrar conexión.
Nota: Dada las especificaciones del objeto PDO de acceso a datos de PHP, bastará con
asignar a nulo el objeto clsConexion para indicar a PHP que finaliza el ámbito del objeto
PDO que implementa dentro de la clase clsConexion.

3.2.1. Atributos privados

a) Atributos relacionados con los datos del cliente/usuario
customerid, username, password, name, firstlastname, secondlastname, birthdaydate,
streetdirection, streetnumber, provincecode, cityid, provinceid, countryid, telephone1,
telephone2, email
b) Atributos de control
Error: de tipo booleano, indicará cualquier error.
CodError: de tipo string, indicará el código de error.
msgError: de tipo string, indicará el detalle del error.

Validated: de tipo booleano, indicará si se ha podido validar el usuario o creado su registro
correctamente.


3.2.2. Constructor I
Esta sobrecarga del constructor, recuperará los datos de un usuario si existe de la tabla
customer.
1º) Recibirá por parámetros el username y password.
2º) Haciendo uso del objeto clsConnection realizará una consulta a la base de datos para
comprobar si el usuario y password son correctos. En la misma consulta, obtendrá los
datos del usuario.
3º) Si el usuario existe, cargará todos los atributos privados correspondiente a los datos
del cliente además de establecer el atributo Validated a true. Si no existiera el usuario,
entonces establecerá a false el atributo Validated.
Cualquier error grave o problema de acceso a datos se ha de indicar estableciendo el
atributo Error a true e indicando el código de error (CodError) y mensaje de error
(msgError). Si no se produjera error, el atributo Error siempre tendrá asignado false y el
atributo CodError y msgError tendrán la cadena vacía.


3.2.3. Constructor II
Esta sobrecarga del constructor, registrará un nuevo usuario en la tabla customer.
1º) Recibirá por parámetros el username, password, name, firstlastname,
secondlastname, birthdaydate, streetdirection, streetnumber, provincecode, cityid,
provinceid, countryid, telephone1, telephone2, email
2º) Haciendo uso del objeto clsConnection realizará una consulta a la base de datos para
comprobar si el username o el email existen. Si existiera al menos alguno de los dos, se
asignará con valor false a la variable Validated y a true la variable Error, además de
indicar el CodError y mensaje de error en msError indicando que el usuario que se intenta
crear ya existe.
Si no existe el username o el email, se realizará un insert en la tabla customer. Se
asignará a true el atributo Validated. El atributo Error será false así como vacía la cadena
asignada a CodError y msgError.
Cualquier error grave o problema de acceso a datos se ha de indicar estableciendo el
atributo Error a true e indicando el código de error (CodError) y mensaje de error
(msgError). Si no se produjera error, el atributo Error siempre tendrá asignado false y el
atributo CodError y msgError tendrán la cadena vacía.


3.2.4. Constructor III
Esta sobrecarga del constructor, recuperará los datos de un usuario si existe de la tabla
customer dado el identificador customerid.
1º) Recibirá por parámetros el identificador único de usuario; customerid.
2º) Haciendo uso del objeto clsConnection realizará una consulta a la base de datos para
comprobar si el usuario existe. En la misma consulta, obtendrá los datos del usuario.
3º) Si el usuario existe, cargará todos los atributos privados correspondiente a los datos
del cliente además de establecer el atributo Validated a true. Si no existiera el usuario,
entonces establecerá a false el atributo Validated.
Cualquier error grave o problema de acceso a datos se ha de indicar estableciendo el
atributo Error a true e indicando el código de error (CodError) y mensaje de error
(msgError). Si no se produjera error, el atributo Error siempre tendrá asignado false y el
atributo CodError y msgError tendrán la cadena vacía.

3.2.5. Método público IsError
Devolverá el valor del atributo Error.
3.2.6. Método público GetCodError
Devolverá el valor del atributo CodError.
3.2.7. Método público GetError
Devolverá el valor del atributo msgError.
3.2.8. Método público IsValidatedUser
Devolverá el valor del atributo Validated.


*/
