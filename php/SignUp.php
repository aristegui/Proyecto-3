<html>
  <head>
  <?php include '../html/Head.html'?>
</head>
  </head>
  <body>
  <?php include '../php/Menus.php' ?>

    <section class="main" id="s1">
    
	<div>
		<form enctype="multipart/form-data" style="float: center" id='fregistro' name='fregistro' action=SignUp.php method="post">
			<table>	
				<div>
					Tipo usuario*:
			   		<input type="radio" name="tipousuario" value="cliente" checked>Cliente
					<input type="radio" name="tipousuario" value="vendedor">Vendedor
					<input type="radio" name="tipousuario" value="ambas">Ambas
				</div>
				<br/>
				<div>
					Email*:
			   		<input type="text" id="mail" name="mail" style="width: 17%">
				</div>
				<br/>
				<div>
					Nombre 
					<input type="text" id="nombre" name="nombre" style="width: 16%">
				</div>
				<br/>
				<div>
					Apellidos:
					<input type="text" id="apellidos" name="apellidos" style="width: 16%">
					<br/>
				</div>
				<br/>
				<div>
					Password*:
					<input type="password" id="password" name="password" style="width: 15%">
				</div>
				<br/>
				<div>
					Repetir Password*:
					<input type="password" id="password2" name="password2" style="width: 12%">		
				</div>
				<br/>
			</table>
			
			<span id="hldr"></span>
			
			<br>
			
			<input  style="margin-top: 15px" id="boton" type="submit" value="Enviar solicitud"></td>
		</form>

		<?php
			if(isset($_POST['tipousuario'], $_POST['mail'],$_POST['nombre'],$_POST['apellidos'], $_POST['password'], $_POST['password2'])){
			
				//Validacion del servidor
				
				$contraseña = $_REQUEST['password'];
				$contraseña2 = $_REQUEST['password2'];

				if($_POST['mail']=="" || $_POST['nombre']=="" ||$_POST['apellidos']==""|| $_POST['password']==""|| $_POST['password2']==""){
					echo("<script>alert('No se permiten campos vacios')</script>");
					echo("<script>window.location = 'SignUp.php'</script>");
				}
				elseif ((!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['mail']))){
					echo("<script>alert('El correo introducido no tiene la estructura adecuada')</script>");
					echo("<script>window.location = 'SignUp.php'</script>");
				}
			
				elseif ($contraseña != $contraseña2){
					echo("<script>alert('Los Passwords introducidos son diferentes')</script>");
					echo("<script>window.location = 'SignUp.php'</script>");
				}
				
				elseif (strlen($_POST['password'])<6) {
					echo("<script>alert('El Password ha de tener al menos 6 caracteres')</script>");
					echo("<script>window.location = 'SignUp.php'</script>");	
				}
				
				else{
				
				
							//Conectar con la base de datos 
							include "DbConfig.php";
							$mysql=mysqli_connect($server, $user, $pass, $basededatos);
							if (!$mysql){
								echo("<script>alert('Fallo al conectar a MySQL: ' . $mysql->connect_error)</script>");
								echo("<script>window.location = 'SignUp.php'</script>");
							}
							//Insertar los datos
							$sql= "INSERT INTO usuario(tipousuario, mail, nombre, apellidos, password) VALUES ('$_POST[tipousuario]', '$_POST[mail]', '$_POST[nombre]', '$_POST[apellidos]', '$_POST[password]')";
							
							//Error al insertar
							if (!mysqli_query($mysql ,$sql)){
								echo("<script>alert('No se ha podido insertar')</script>");
								echo("<script>window.location = 'SignUp.php'</script>");
								die('Error: ' . mysqli_error($mysql));
							}else{
								echo("<script>alert('Se ha realizado el registro de forma correcta')</script>");
								echo("<script>window.location = 'LogIn.php'</script>");
							}
							// Cerrar conexión
							mysqli_close($mysql);
						} 
				}
			
        ?>

	</div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>
</html>