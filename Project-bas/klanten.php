<?php

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include_once 'classes/klant.php';
		
		$klant = new Klant;
		//$acteur->setObject(0, $_POST['klantnaam'], $_POST['klantEmail']);
		//$acteur->insertActeur();
		$klant->insertActeur2($_POST['klantnaam'], $_POST['klantEmail'], $_POST['klantAdres'], $_POST['klantPostcode'], $_POST['klantWoonplaats']);
			
		echo "<script>alert('klant: $_POST[klantnaam] $_POST[klantEmail] is toegevoegd')</script>";
		echo "<script> location.replace('confirm.html'); </script>";
			
	} 

?>

<!DOCTYPE html>
<head>

<link rel="stylesheet" href="stylesheet.css">
<title>Bas klant</title>
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">

</head>
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
   <label for="an">klantAdres:</label>
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

	<a href='hoofdpagina.html'>Terug</a>

</body>
</html>



