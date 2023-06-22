<html>

<body>
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">
	<h1>Bas Artikel</h1>
	<title>ArtikelToevoegen</title>
	
	<nav>
		
		<a href='insertArtikel.php'>Nieuwe Artikel toevoegen</a><br><br>
	</nav>
	
<?php

include_once "../classes/Artikel.php";

// Maak een object Artikel
$Artikel = new Artikel;

// Start CRUD
$Artikel->crudArtikel();

?>
<a href='../Hoofdpagina.html'>Home</a><br>
</body>
</html>