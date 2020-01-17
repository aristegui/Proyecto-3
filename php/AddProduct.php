<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  
  <section class="main" id="s1">
    <div style="float: left;">
	<?php
	if(isset($_GET['mail'],$_GET['tipodeproducto'], $_GET['descripcion'], $_GET['color'], $_GET['precio'], $_GET['Categoria'], $_GET['Peso'])){		
		//Validacion del servidor

		if($_GET['mail']=="" || $_GET['tipodeproducto']=="" || $_GET['descripcion']==""|| $_GET['color']==""|| $_GET['precio']==""|| $_GET['Categoria']==""|| $_GET['Peso']=="" ){
			echo("<script>alert('No se permiten campos vacios')</script>");
			echo("<script>window.location = 'ProductsForm.php?mail=$mail'</script>");
		}

		elseif ((!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_GET['mail']))){
			echo("<script>alert('El correo introducido no tiene la estructura adecuada')</script>");
			echo("<script>window.location = 'ProductsForm.php?mail=$mail'</script>");
		}
	
		elseif (strlen($_GET['tipodeproducto'])<5) {
			echo("<script>alert('El producto ha de tener al menos 10 caracteres')</script>");
			echo("<script>window.location = 'ProductsForm.php?mail=$mail'</script>");
		}
			
		else{
			//Conectar con la base de datos 
			include "DbConfig.php";
			$mysql=mysqli_connect($server,$user,$pass,$basededatos);
			if (!$mysql){
				echo("<script>alert('Fallo al conectar a MySQL: ' . $mysql->connect_error)</script>");
				echo("<script>window.location = 'ProducsForm.php'</script>");
			}
			
			//Insertar los datos
			$sql= "INSERT INTO productos(email, tipodeproducto, descripcion, color, precio, Categoria, Peso )VALUES ('$_GET[mail]','$_GET[tipodeproducto]','$_GET[descripcion]','$_GET[color]','$_GET[precio]','$_GET[Categoria]',$_GET[Peso])";

			//Error al insertar
			if (!mysqli_query($mysql ,$sql)){ 	
				die('Error: ' . mysqli_error($mysql));
				echo("<script>alert('No se ha podido insertar')</script>");
				echo("<script>window.location = 'ProductsForm.php'</script>");
			}
					
			$mail=$_GET['mail'];
		
			

			// Cerrar conexión
			mysqli_close($mysql);

			//Insertar en Productos.xml
			$productos = simplexml_load_file('../xml/Productos.xml') or die ("Error al abrir el xml");

			if ($productos == false) {
				echo "Error cargando XML\n";
				foreach(libxml_get_errors() as $error) {
					echo "\t", $error->message;
				}
			}

			$nuevaP = $productos->addChild('assessmentItem');
						 
			$nuevaP->addAttribute('categoria', $_GET['Categoria']);
			$nuevaP->addAttribute('vendedor', $_GET['mail']);
			
			$body=$nuevaP->addChild('itemBody');
			$body->addChild('p',$_GET['descripcion']);
			$correcta = $nuevaP->addChild('articulo');
			$correcta->addChild('a', $_GET['tipodeproducto']);
			$color = $nuevaP->addChild('color');
			$color->addChild('c', $_GET['color']);
			$OPrecio = $nuevaP->addChild('precio');
			$OPrecio->addChild('value', $_GET['precio']);
			

			$productos->asXML('../xml/Productos.xml');
			echo("<script>alert('El producto se ha añadido correctamente')</script>");
			
		}
	}
	?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
  </div>
</body>
</html>