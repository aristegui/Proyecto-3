<div id='page-wrap'>
<header class='main' id='h1'>
	<?php
    if (isset($_GET['mail'])){
		$mail = $_GET["mail"];
		echo "<span class='right'><a href='LogOut.php'>Logout</a></span>";
		echo " ";
		echo $mail;
	}else{
		echo "<span class='right'><a href='SignUp.php'>Registro</a></span>";
		echo " ";
		echo "<span class='right'><a href='LogIn.php'>Login</a></span>";
		echo " ";
		echo "Anonimo";
    }
    ?>

</header>
<nav class='main' id='n1' role='navigation'>
	<?php
    if (isset($_GET['mail'])){
		echo "<span><a href='Layout.php?mail=$mail'>Inicio</a></span>";
		echo "<span><a href='ProductsForm.php?mail=$mail'>Insertar productos</a></span>";
		echo "<span><a href='ShowXmlProduct.php?mail=$mail'>Catálogo de productos</a></span>";
		echo "<span><a href='Credits.php?mail=$mail'>Creditos</a></span>";
    }else{
		echo '<span><a href="Layout.php">Inicio</a></span>';
		echo '<span><a href="Credits.php">Creditos</a></span>';
    }
    ?>
</nav>