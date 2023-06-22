<?php


if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include_once '../classes/Klant.php';
		
		$acteur = new Klant;
		//$acteur->setObject(0, $_POST['klantnaam'], $_POST['klantemail']);
		//$acteur->insertKlant();
		$acteur->insertKlant($_POST['klantnaam'], $_POST['klantemail'], $_POST['klantAdres'], $_POST['klantPostcode'], $_POST['klantWoonplaats']);
			
		echo "<script>alert('Klant: $_POST[klantnaam] $_POST[klantemail] is toegevoegd')</script>";
		echo "<script> location.replace('read.php'); </script>";
			
	} 

?>

<!DOCTYPE html>
<html>
<body>
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">
	<h1>Bas Klant</h1>
	<h2>Toevoegen</h2>
	<form method="post">
	<label for="nv">Klantnaam:</label>
	<input type="text" id="nv" name="klantnaam" placeholder="Klantnaam" required/>
	<br>   
	<label for="an">Klantemail:</label>
	<input type="text" id="an" name="klantemail" placeholder="Klantemail" required/>
	<br>
	<label for="an">KlantAdres:</label>
	<input type="text" id="an" name="klantAdres" placeholder="KlantAdres" required/>
	<br>
	<label for="an">KlantPostcode:</label>
	<input type="text" id="an" name="klantPostcode" placeholder="KlantPostcode" required/>
	<br>
	<label for="an">KlantWoonplaats:</label>
	<input type="text" id="an" name="klantWoonplaats" placeholder="KlantWoonplaats" required/>
	<br><br>
	<input type='submit' name='insert' value='Toevoegen'>
	</form></br>

	<a href='read.php'>Terug</a>

</body>
</html>



