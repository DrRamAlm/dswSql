<?php
//include("classes/connection.php");
include("classes/client.php");
function validateLoginForm()
{
    return true;
}


function validateRegisterForm($data)
{
    return true;
}

function loadDataIntoSession($data)
{
    foreach ($data as $key => $value) {
        $_SESSION[$key] = $value;
    }
}

function getOptionsFromTable($table)
{

    $conn =  new Database("localhost", "root", "");
    $data = $conn->getAllFromTable($table);
    foreach ($data as $key => $value) {
        print "<option value=\"$value[0]\">$value[1]</option>";
    }
    unset($conn);
}

function showRegisterform()
{

?>
    <div class="RegisterForm">
        <form action="register.php" method="post">
            <label for="username">Usuario:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <label for="name">Nombre:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="firstlastname">Apellido 1:</label><br>
            <input type="text" id="firstlastname" name="firstlastname"><br>
            <label for="secondlastname">Apellido 2:</label><br>
            <input type="text" id="secondlastname" name="secondlastname"><br>
            <label for="birthdaydate">Fecha Nacimiento:</label><br>
            <input type="text" id="birthdaydate" name="birthdaydate"><br>
            <label for="streetdirection">Calle:</label><br>
            <input type="text" id="streetdirection" name="streetdirection"><br>
            <label for="streetnumber">Número:</label><br>
            <input type="text" id="streetnumber" name="streetnumber"><br>
            <label for="provincecode">Código Postal:</label><br>
            <input type="text" id="provincecode" name="provincecode"><br>
            <label for="cityid">Municipio:</label><br>
            <select type="text" id="cityid" name="cityid">
                <?php getOptionsFromTable("city") ?>
            </select><br>
            <label for="provinceid">Provincia:</label><br>
            <select type="text" id="provinceid" name="provinceid"><br>
                <?php getOptionsFromTable("province") ?>
            </select><br>
            <label for="countryid">País:</label><br>
            <select type="text" id="countryid" name="countryid">
                <?php getOptionsFromTable("country") ?>
            </select><br>
            <label for="telephone1">Telefono 1:</label><br>
            <input type="text" id="telephone1" name="telephone1"><br>
            <label for="telephone2">Teléfono 2:</label><br>
            <input type="text" id="telephone2" name="telephone2"><br>
            <label for="email">Correo electrónico</label><br>
            <input type="text" id="email" name="email"><br>
            <input type="submit" value="Enviar">
        </form>
    </div>

    <form action="index.php">
        <input type="submit" value="Cancelar" />
    </form>

<?php


}
function showLoginForm()
{
?>
    <div class="loginForm">
        <form action="validateuser.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="pass">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>



            <input type="submit" value="Enviar">

        </form>
    </div>

    <div class="registerLink"> <a href="newuser.php">Nueva Cuenta</a></div>
<?php
}

function clearData()
{
    session_start();
    setcookie("ckdatauser", -1, -1);
    session_destroy();
}

function showErrors($errorCode)
{
}
