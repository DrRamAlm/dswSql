<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();

    include("functions.php");
    /*
    $user = Client::fromFormData(
        $_POST["username"],
        $_POST["password"],
        $_POST["name"],
        $_POST["firstlastname"],
        $_POST["secondlastname"],
        $_POST["birthdaydate"],
        $_POST["streetdirection"],
        $_POST["streetnumber"],
        $_POST["provincecode"],
        $_POST["cityid"],
        $_POST["provinceid"],
        $_POST["countryid"],
        $_POST["telephone1"],
        $_POST["telephone2"],
        $_POST["email"]
    );*/
    $user = Client::fromFormData($_POST);// aquí habra que darlo de alta en la bd $myObject = MyClass::makeNewWithParameterA("foo");

    if ($user->isError()) {
        loadDataIntoSession($_POST);
        $_SESSION["error"] = $user->getError();
        
        header("location: newuser.php?error");
    } else {

        
        // usar el constructor estatico 2
        if (!$user->isError() && $user->isValid()) {
            setcookie("ckdatauser", $user->getId(), time() + (3600 * 24));
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $user;
           
            header("location: home.php");
        } else {

            loadDataIntoSession($_POST);
            $_SESSION["error"] = $user->getError();

            header("location: newuser.php?error");
        }
    }
} else {
    header("location: index.php");
}


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
