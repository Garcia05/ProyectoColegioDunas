<?php
    session_start();
    if(!empty($_SESSION['login_user'])){
        header('Location: home.php');
    }
    elseif(!empty($_SESSION['login_admin'])){
        header('Location: gestor.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/ajax-up.js"></script>
</head>
<body>
    <div class="form_style" id="box">
    <h1 style="text-align:center;">Iniciar sesion</h1>
        <form class="frmUpload" action="" method="post">
            <div id="resultado"></div>
            <label for="nombre">DNI:</label><br>
            <input type="text" id="username" name="username">
            <br/><br/>
            <label for="pass">Contraseña:</label><br>
            <input type="password" id="password" name="password">
            <br>
            <br>
            <input type="submit" value="Iniciar Sesion" class="btn-upload" id="login"/>
        </form>
    </div>
</body>
</html>
