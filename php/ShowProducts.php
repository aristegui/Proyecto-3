<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div style="float: center; height: 500px; overflow: scroll;">
	<br>
    <?php
      //Conectar con la base de datos
	  include "DbConfig.php";
	  $mysql=mysqli_connect($server,$user,$pass,$basededatos);
			if (!$mysql){
				echo("<script>alert('Fallo al conectar a MySQL: ' . $mysql->connect_error)</script>");
				echo("<script>window.location = 'ShowProducts.php'</script>");
			}

			//Insertar los datos
			$productos=mysqli_query($mysql, "SELECT * FROM productos");

			//Error al consultar
			if (!$productos){ 	
				die('Error: ' . mysqli_error($mysql));
				echo("<script>alert('No se ha podido insertar')</script>");
				echo("<script>window.location = 'ShowProducts.php'</script>");
			}

			 //Crear la tabla
			 echo '<table border=1> <tr> <th> Vendedor </th> <th> Tipo de producto </th><th> Precio </th>
				</tr>';
				while ($row = mysqli_fetch_array($productos)) {
				echo '<tr><td>' . $row["email"] . '</td> <td>' . $row["tipodeproducto"] .'</td> <td>' . $row["precio"] .'</td>';
				}
				echo '</table>';

			// Cerrar conexión
			mysqli_close($mysql);  
	?>

		
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
