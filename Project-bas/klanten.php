<?php

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include_once 'classes/klant.php';
		
		$klant = new Klant;
		//$acteur->setObject(0, $_POST['klantnaam'], $_POST['klantEmail']);
		//$acteur->insertActeur();
		$klant->insertActeur2($_POST['klantnaam'], $_POST['klantEmail'], $_POST['klantAdres'], $_POST['klantPostcode'], $_POST['klantWoonplaats']);
			
		echo "<script>alert('Acteur: $_POST[klantnaam] $_POST[klantEmail] is toegevoegd')</script>";
		echo "<script> location.replace('index.php'); </script>";
			
	} 

?>

<!DOCTYPE html>
<html>
<body>

	<h1>Klant toevoegen</h1>
	<h2>Toevoegen</h2>
	<form method="post">
	<label for="nv">klantnaam:</label>
   <input type="text" id="nv" name="klantnaam" placeholder="klantnaam" required/>
   <br>   
   <label for="an">klantEmail:</label>
   <input type="text" id="an" name="klantEmail" placeholder="klantEmail" required/>
   <br>
   <label for="an">klandAdres:</label>
   <input type="text" id="an" name="klantAdres" placeholder="klantAdres" required/>
   <br>
   <label for="an">klantPostcode:</label>
   <input type="text" id="an" name="klantPostcode" placeholder="klantPostcode" required/>
   <br>
   <label for="an">klantWoonplaats:</label>
   <input type="text" id="an" name="klantWoonplaats" placeholder="klantWoonplaats" required/>
   <br>

	<input type='submit' name='insert' value='Toevoegen'>
	</form></br>

	<a href='index.php'>Terug</a>

</body>
</html>



