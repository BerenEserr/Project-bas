<html>

<body>
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">
	<h1>Bas Klant</h1>
	<title>KlantToevoegen</title>
	
	<nav>
		
		<a href='insert.php'>Nieuwe klant toevoegen</a><br><br>
	</nav>
	
<?php

include_once "../classes/Klant.php";

// Maak een object Klant
$klant = new Klant;

// Start CRUD
$klant->crudKlant();

?>
<a href='../Hoofdpagina.html'>Home</a><br>
</body>
</html>