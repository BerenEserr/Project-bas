<?php 

include_once "../classes/Artikel.php";


if(isset($_POST["verwijderen"])){
	
	// Maak een object Klant
	$Artikel = new Artikel;
	
	// Delete Klant op basis van NR
	$Artikel->deleteArtikel($_GET["artId"]);
	echo '<script>alert("Artikel verwijderd")</script>';
	echo "<script> location.replace('readArtikel.php'); </script>";
}
?>



