<?php
    session_start();
    include("db.php");
    if ($db ->connect_error) {
        echo ("Connection failed: " . $db ->connect_error);
        exit();
    }
    @mysqli_query($db, "SET NAMES 'utf8'");
    if ($_POST['username'] == null || $_POST['password'] == null)
    {
        echo "<span>Por favor complete todos los campos.</span>";
    }
    else{ 
        $username=mysqli_real_escape_string($db,$_POST['username']);  
        $password=mysqli_real_escape_string($db,$_POST['password']); 
        
        $result=mysqli_query($db,"SELECT username FROM administradores WHERE username='$username' and password='$password'");
        $result1=mysqli_query($db,"SELECT dni FROM alumnos WHERE dni='$username' and password='$password'");
        if (mysqli_num_rows($result) > 0)
        {
            $_SESSION['login_admin']=$username;
            echo "<script>location.href = 'gestor.php'</script>";
        }
        elseif (mysqli_num_rows($result1) > 0){
            $_SESSION['login_user']=$username;
            echo "<script>location.href = 'home.php'</script>";
        }
        else{
            echo "<span style='color:#cc0000'>Error: El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>";
        }
    }
?>
