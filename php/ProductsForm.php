<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <form id='fquestion' name='fquestion' action='AddProduct.php'>
	<?php
	        if(isset($_GET["mail"])){
				$mail = $_GET["mail"];
				echo "Dirección de Correo*: <input type='text' id='mail' name='mail' style='width: 15%' value='$mail' readonly/>";
	        }
		?>
			<br/>
			<br/>
			<div>
				Título de producto:
				<input type="text" id="tipodeproducto" name="tipodeproducto" style="width: 15%"/>
			</div>
			<br/>
			<div>
				Descripción corta del producto:
				<br/>
				<br/>
				<textarea id="descripcion" name="descripcion" rows= "5" cols="35"></textarea>
			</div>
			<br/>
			<div>
				Color del producto:
				<input type="text" id="color" name="color" style="width: 15%"/>
			</div>
			<br/>
			<div>
				¿Por cuanto lo quiere vender?
				<input type="text" id="precio" name="precio" style="width: 14%; high: 10%"/>
				<br/>
				**Necesario añadir el simbolo de la moneda (€/$) después de los digitos.
			</div>
			<br/>
			<div>
				Categoria:
				<select name="Categoria" id="Categoria">
					<option value="1">Mujer</option>
					<option value="2">Hombre</option>
					<option value="3">Otros</option>	
				</select>
			</div>
			<br/>
			<div>
				Envio, indicar el peso aproximado:
				<select name="Peso" id="Peso">
					<option value="1">Menos de 2Kg</option>
					<option value="2">Entre 2Kg y 5Kg</option>
					<option value="3">Mas de 5Kg</option>	
				</select>
			</div>
			<br/>
	       
			<input type= "submit" id ="Boton" name ="submit" value="Añadir producto">
			<br/><br/>
			
	</form>
	</section>
	</div>

	<script src="../js/jquery-3.4.1.min.js"></script>
	
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
