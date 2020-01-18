<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div style="float: left;  height: 500px; overflow: scroll;">
		<?php
			$productos = simplexml_load_file('../xml/Productos.xml') or die ("Error al abrir el xml");

			echo '<table  border=1> <tr> <th> Vendedor </th><th> Articulo </th> <th>Descripcion</th> <th>Color</th> <th> Precio </th> </tr>';

			foreach ($productos->children() as $producto){
				echo '<tr>';
			
				echo '<td>' . $producto->attributes()->vendedor . '</td>';
				echo '<td>' . $producto->articulo->a . '</td>';
				echo '<td>' . $producto->itemBody->p . '</td>';
				echo '<td>' . $producto->color->c. '</td>';
				echo '<td>' . $producto->precio->value . '</td>';	
				echo '</tr>';
			}
			echo '</table>';
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>