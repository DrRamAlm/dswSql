<?php

include("classes/connection.php");
class Client
{

    private  $error, $codError, $msgError;
    private  bool $validated = false;

    private Database $conn;

    const  TABLE_NAME = 'customer';





    private function insertIntoDb()
    {
        $this->newConn();
        $data = array(
            "username" => $this->username,  "name" => $this->name,  "firstlastname" => $this->firstlastname,  "secondlastname" => $this->secondlastname,
            "birthdaydate" => $this->birthdaydate,  "streetdirection" => $this->streetdirection,  "streetnumber" => $this->streetnumber,
            "provincecode" => $this->provincecode,  "cityid" => $this->cityid,  "provinceid" => $this->provinceid,  "countryid" => $this->countryid,
            "telephone1" => $this->telephone1,  "telephone2" => $this->telephone2,
            "password" => $this->password,  "email" => $this->email
        );
        $result =  $this->conn->insert($data, self::TABLE_NAME);

        if ($result->errorCode() == '00000') {
            $this->validated = true;
            $this->error = false;
        } else {
            $this->error = true;
            $this->msgError = $result->errorInfo()[2];
        }
        unset($this->conn);
    }

    private function getFromDB($data)
    {
        $this->newConn();
        $result =  $this->conn->getRowfromValues($data, self::TABLE_NAME);

        if ($result) {
            
            $this->validated = true;
            $this->error = false;
            $this->loadData($result);
        } else {
            
            $this->validated = false;
            $this->setError();
            
            $this->msgError = "Datos incorrectos";
        }
        unset($this->conn);
    }

    public static function fromFormData($data): static
    {
        $user = new Client($data);
        $user->insertIntoDb();
        return $user;
    }

    public static function fromCustomerID($customerid): static // contructor 3
    {
        $data =  array("customerid" => $customerid);
        $user = new Client($data);
        $user->getFromDB($data);

        return $user;
    }

    public static function fromUserPass($username, $password): static // contructor 1
    {

        $data = array("username" => $username, "password" => $password);
        $user = new Client($data);
        $user->getFromDB($data);

        return $user;
    }



    public function __construct($data)
    {
        $this->error = true;
        $this->loadData($data);
    }


    private function loadData($data)
    {
        /*
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }*/
        isset($data["customerid"]) ? $this->customerid = $data["customerid"] : $this->customerid = "";
        isset($data["username"]) ? $this->username = $data["username"] : $this->username = "";
        isset($data["password"]) ? $this->password = $data["password"] : $this->password = "";
        isset($data["name"]) ? $this->name = $data["name"] : $this->name = "";
        isset($data["firstlastname"]) ? $this->firstlastname = $data["firstlastname"] : $this->firstlastname = "";
        isset($data["secondlastname"]) ? $this->secondlastname = $data["secondlastname"] : $this->secondlastname = "";
        isset($data["birthdaydate"]) ? $this->birthdaydate = $data["birthdaydate"] : $this->birthdaydate = "";
        isset($data["streetdirection"]) ? $this->streetdirection = $data["streetdirection"] : $this->streetdirection = "";
        isset($data["streetnumber"]) ? $this->streetnumber = $data["streetnumber"] : $this->streetnumber = "";
        isset($data["provincecode"]) ? $this->provincecode = $data["provincecode"] : $this->provincecode = "";
        isset($data["cityid"]) ? $this->cityid = $data["cityid"] : $this->cityid = "";
        isset($data["provinceid"]) ? $this->provinceid = $data["provinceid"] : $this->provinceid = "";
        isset($data["countryid"]) ? $this->countryid = $data["countryid"] : $this->countryid = "";
        isset($data["telephone1"]) ? $this->telephone1 = $data["telephone1"] : $this->telephone1 = "";
        isset($data["telephone2"]) ? $this->telephone2 = $data["telephone2"] : $this->telephone2 = "";
        isset($data["email"]) ? $this->email = $data["email"] : $this->email = "";
    }


    public function getId()
    {
        return $this->customerid;
    }

    public function setValidated($value)
    {
        $this->validated = $value;
    }



    public function isError()
    {
        return $this->error;
    }

    public function getError()
    {

        return $this->msgError;
    }

    public function clearError()
    {
        $this->error = false;
    }

    private function setError()
    {
        $this->error = true;
    }

    public function isValid()
    {
        return $this->validated;
    }



    private function newConn()
    {
        $this->conn = new Database("localhost", "root", "");
    }

    public function describe()
    {
?>

        <div class="user">
            <div class="udata username">Nombre de Usuario: <?php print $this->username ?></div>
            <div class="udata name">Nombre: <?php print $this->name ?></div>
            <div class="udata firstlastname">Apellido 1: <?php print $this->firstlastname ?></div>
            <div class="udata secondlastname">Apellido 2: <?php print $this->secondlastname ?></div>
            <div class="udata birthdaydate"> Fecha de Nacimiento: <?php print $this->birthdaydate ?></div>
            <div class="udata streetdirection">Calle: <?php print $this->streetdirection ?></div>
            <div class="udata streetnumber">Numero: <?php print $this->streetnumber ?></div>
            <div class="udata provincecode">C.P.: <?php print $this->provincecode ?></div>
            <div class="udata cityid">Localidad: <?php print $this->cityid ?></div>
            <div class="udata provinceid">Provincia: <?php print $this->provinceid ?></div>
            <div class="udata countryid">Pa??s: <?php print $this->countryid ?></div>
            <div class="udata telephone1">Tel??fono 1: <?php print $this->telephone1 ?></div>
            <div class="udata telephone2">Tel??fono 2: <?php print $this->telephone2 ?></div>
            <div class="udata email">Correo Electr??nico: <?php print $this->email ?></div>





        </div>
<?php
    }
}


/*

Esta clase permitir?? centralizar los datos del cliente a modo de entidad de la tabla
customer.
Deber?? implementar como m??nimo los m??todos y atributos que se indican a continuaci??n.
Podr?? a??adir los m??todos y atributos adicionales que necesite, $como por ejemplo para
acceder a los valores de los atributos privados, destructor, etc.
Para el acceso a datos, esta clase deber?? instanciar a objetos de la clase clsConnection y
llevar a cabo el paradigma de acceso a datos; abrir conexi??n, ejecutar y cerrar conexi??n.
Nota: Dada las especificaciones del objeto PDO de acceso a datos de PHP, bastar?? con
asignar a nulo el objeto clsConexion para indicar a PHP que finaliza el ??mbito del objeto
PDO que implementa dentro de la clase clsConexion.

3.2.1. Atributos privados

a) Atributos relacionados con los datos del cliente/usuario
customerid, username, password, name, firstlastname, secondlastname, birthdaydate,
streetdirection, streetnumber, provincecode, cityid, provinceid, countryid, telephone1,
telephone2, email
b) Atributos de control
Error: de tipo booleano, indicar?? cualquier error.
CodError: de tipo string, indicar?? el c??digo de error.
msgError: de tipo string, indicar?? el detalle del error.

Validated: de tipo booleano, indicar?? si se ha podido validar el usuario o creado su registro
correctamente.


3.2.2. Constructor I
Esta sobrecarga del constructor, recuperar?? los datos de un usuario si existe de la tabla
customer.
1??) Recibir?? por par??metros el username y password.
2??) Haciendo uso del objeto clsConnection realizar?? una consulta a la base de datos para
comprobar si el usuario y password son correctos. En la misma consulta, obtendr?? los
datos del usuario.
3??) Si el usuario existe, cargar?? todos los atributos privados correspondiente a los datos
del cliente adem??s de establecer el atributo Validated a true. Si no existiera el usuario,
entonces establecer?? a false el atributo Validated.
Cualquier error grave o problema de acceso a datos se ha de indicar estableciendo el
atributo Error a true e indicando el c??digo de error (CodError) y mensaje de error
(msgError). Si no se produjera error, el atributo Error siempre tendr?? asignado false y el
atributo CodError y msgError tendr??n la cadena vac??a.


3.2.3. Constructor II
Esta sobrecarga del constructor, registrar?? un nuevo usuario en la tabla customer.
1??) Recibir?? por par??metros el username, password, name, firstlastname,
secondlastname, birthdaydate, streetdirection, streetnumber, provincecode, cityid,
provinceid, countryid, telephone1, telephone2, email
2??) Haciendo uso del objeto clsConnection realizar?? una consulta a la base de datos para
comprobar si el username o el email existen. Si existiera al menos alguno de los dos, se
asignar?? con valor false a la variable Validated y a true la variable Error, adem??s de
indicar el CodError y mensaje de error en msError indicando que el usuario que se intenta
crear ya existe.
Si no existe el username o el email, se realizar?? un insert en la tabla customer. Se
asignar?? a true el atributo Validated. El atributo Error ser?? false as?? como vac??a la cadena
asignada a CodError y msgError.
Cualquier error grave o problema de acceso a datos se ha de indicar estableciendo el
atributo Error a true e indicando el c??digo de error (CodError) y mensaje de error
(msgError). Si no se produjera error, el atributo Error siempre tendr?? asignado false y el
atributo CodError y msgError tendr??n la cadena vac??a.


3.2.4. Constructor III
Esta sobrecarga del constructor, recuperar?? los datos de un usuario si existe de la tabla
customer dado el identificador customerid.
1??) Recibir?? por par??metros el identificador ??nico de usuario; customerid.
2??) Haciendo uso del objeto clsConnection realizar?? una consulta a la base de datos para
comprobar si el usuario existe. En la misma consulta, obtendr?? los datos del usuario.
3??) Si el usuario existe, cargar?? todos los atributos privados correspondiente a los datos
del cliente adem??s de establecer el atributo Validated a true. Si no existiera el usuario,
entonces establecer?? a false el atributo Validated.
Cualquier error grave o problema de acceso a datos se ha de indicar estableciendo el
atributo Error a true e indicando el c??digo de error (CodError) y mensaje de error
(msgError). Si no se produjera error, el atributo Error siempre tendr?? asignado false y el
atributo CodError y msgError tendr??n la cadena vac??a.

3.2.5. M??todo p??blico IsError
Devolver?? el valor del atributo Error.
3.2.6. M??todo p??blico GetCodError
Devolver?? el valor del atributo CodError.
3.2.7. M??todo p??blico GetError
Devolver?? el valor del atributo msgError.
3.2.8. M??todo p??blico IsValidatedUser
Devolver?? el valor del atributo Validated.

*/