<?php
    session_start();
    if(empty($_SESSION['login_admin'])){
        header('Location: index.php');
}
?>
<html>
	<head>
		<title>Sistema</title>
		<link rel="stylesheet" href="styles/style_hom.css">
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	</head>
	<body>
    <div class="header">
        <h1>COLEGIO N</h1>
        <p>nnn</p>
    </div>
    <div class="header_nav">
        <ul class="nav">
            <li><a href="">Registrar</a>
                <ul>
                    <li><button value="" onClick="#">Alumnos</button></li>
                    <li><button>Docentes</button></li>
                    <li><button>Padres o Apoderados</button></li>
                </ul>
            </li>
            <li><a href="">Servicios</a>
                <ul>
                    <li><button value="<?php echo $_SESSION['login_user'] ?>" onClick="Libreta_notas(event,value)">Gestionar Pagos</button></li>
                    <li><button value="<?php echo $_SESSION['login_user'] ?>" onClick="Libreta_notas(event,value)">Pagos de Otros Servicios</button></li>
                </ul>

            </li>
            <li style="float:right"><a href="logout.php">Cerrar Sesion</a></li>
        </ul>
    </div><br>
    <div id="mostrar" class="card"></div>
    <script>
        function Libreta_notas(e,user){
            e.preventDefault();
            $.ajax({
                url: "libreta.php",
                type: "POST",
                data: "me="+user,
                success: function(resp){
                    $('#mostrar').html(resp);
                    document.getElementById("content").innerHTML = response.html;
                    document.title = response.pageTitle;
                    window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"sdsdsd", urlPath);
                    //location.href = "libreta.php?me="+ user;
                }        
            });
        }
        
    </script>
    <script>
        $("#member").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "libreta.php",
                data: {
                    me:me
                },
                success: function (data) {
                    alert(data);
                }
            });
        });
    </script>
	</body>
</html>

