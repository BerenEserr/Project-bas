<?php


if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include_once '../classes/Artikel.php';
		
		$artikel = new Artikel;
		
		$artikel->insertArtikel($_POST['artOmschrijving'], $_POST['artInkoop'], $_POST['artVerkoop'], $_POST['artVoorraad'], $_POST['artMaxVoorraad'], $_POST['artLocatie']);
			
		echo "<script>alert('Klant: $_POST[artOmschrijving] $_POST[artInkoop] is toegevoegd')</script>";
		echo "<script> location.replace('readArtikel.php'); </script>";
			
	} 

?>

<!DOCTYPE html>
<html>
<body>
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">
	<h1>CRUD Klant</h1>
	<h2>Toevoegen</h2>
	<form method="post">
	<label for="nv">artOmschrijving</label>
	<input type="text" id="nv" name="artOmschrijving" placeholder="artOmschrijving" required/>
	<br>   
	<label for="an">artInkoop:</label>
	<input type="text" id="an" name="artInkoop" placeholder="artInkoop" required/>
	<br>   
	<label for="an">artVerkoop:</label>
	<input type="text" id="an" name="artVerkoop" placeholder="artVerkoop" required/>
	<br>   
	<label for="an">artVoorraad:</label>
	<input type="text" id="an" name="artVoorraad" placeholder="artVoorraad" required/>
	<br>   
	<label for="an">artMaxVoorraad:</label>
	<input type="text" id="an" name="artMaxVoorraad" placeholder="artMaxVoorraad" required/>
	<br>   
	<label for="an">artLocatie:</label>
	<input type="text" id="an" name="artLocatie" placeholder="artLocatie" required/>
	<br><br>
	<input type='submit' name='insert' value='Toevoegen'>
	</form></br>

	<a href='readArtikel.php'>Terug</a>

</body>
</html>



