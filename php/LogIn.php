<!DOCTYPE html>
<html>
  <head>
  <?php include '../html/Head.html'?>
</head>
  </head>
  <body>
  <?php include '../php/Menus.php' ?>

    <section class="main" id="s1">
    
	<div>
		<form enctype="multipart/form-data" style="float: center" id='flogin' name='flogin' action=LogIn.php method="post">
			<table>		
				<div>
					Email*:
			   		<input type="text" id="mail" name="mail" style="width: 17%">
				</div>
				<br/>
				<div>
					Password*:
					<input type="password" id="password" name="password" style="width: 15%">
				</div>	
			</table>
			<br>

			<input style="margin-top: 20px" id="submit" type="submit" value="Iniciar sesión"></td>
		</form>

		<?php
			if(isset($_POST['mail'],$_POST['password'])){
				
				//Contectar con la base de datos 
				include "DbConfig.php";
				$mysql=mysqli_connect($server, $user, $pass, $basededatos);
				if (!$mysql){
					echo("<script>alert('Fallo al conectar a MySQL: ' . $mysql->connect_error)</script>");
					echo("<script>window.location = 'LogIn.php'</script>");
				}
				
				//Obtener los datos
				$sql= "SELECT password FROM usuario WHERE mail='".$_POST['mail']."'";

				//Ejecutar consulta
				$usuario=mysqli_query($mysql,$sql);
				$mail=$_POST['mail'];
				$password=$_POST['password'];
				$fila = mysqli_fetch_array($usuario);
				
				if($_POST['mail']=="" || $_POST['password']==""){
					echo("<script>alert('No se permiten campos vacios')</script>");
					echo("<script>window.location = 'LogIn.php'</script>");
				}

    			if($password==$fila["password"]){
					echo("<script>alert('Bienvenido al sistema ¡$mail!')</script>");
					echo("<script>window.location = 'Layout.php?mail=$mail'</script>");
    			}
				
   				else{
					echo("<script>alert('Los datos son incorrectos')</script>");
					echo("<script>window.location = 'LogIn.php'</script>");
   				}
				
				//Error al consultar
				if (!$usuario){ 	
					die('Error: ' . mysqli_error($mysql));
					echo("<script>alert('No se ha podido insertar')</script>");
					echo("<script>window.location = 'LogIn.php'</script>");
				}

				// Cerrar conexión
				mysqli_close($mysql);
			}
		?>

	</div>
    </section>
    <?php include '../html/Footer.html' ?>
</div>

</body>
</html>