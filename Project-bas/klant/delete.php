<?php 

include_once "../classes/Klant.php";


if(isset($_POST["verwijderen"])){
	
	// Maak een object Klant
	$acteur = new Klant;
	
	// Delete Klant op basis van NR
	$acteur->deleteKlant($_GET["klantid"]);
	echo '<script>alert("Klant verwijderd")</script>';
	echo "<script> location.replace('read.php'); </script>";
}
?>



