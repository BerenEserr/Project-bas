<?php

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include_once 'classes/verkooporders.php';
		
		$verkooporder = new verkooporder;
		//$acteur->setObject(0, $_POST['klantnaam'], $_POST['klantEmail']);
		//$acteur->insertActeur();
		$verkooporder->insertActeur2($_POST['klantId'], $_POST['artId'], $_POST['verkOrdDatum'], $_POST['verkOrdAantal'], $_POST['verkOrdStatus']);
			
		echo "<script>alert('klant: $_POST[klantnaam] $_POST[klantEmail] is toegevoegd')</script>";
		echo "<script> location.replace('index.php'); </script>";
			
	} 

?>

<!DOCTYPE html>
<head>

<link rel="stylesheet" href="stylesheet.css">
<title>Bas Verkooporder</title>
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">

</head>

<body>

	<h1>verkooporder aanmaken</h1>
	
	<form method="post">
	<label for="nv">klantid:</label>
   <input type="text" id="nv" name="klantid" placeholder="klantid" required/>
   <br>   
   <label for="an">artID:</label>
   <input type="text" id="an" name="artID" placeholder="artID" required/>
   <br>
   <label for="an">datum</label>
   <input type="text" id="an" name="datum" placeholder="datum" required/>
   <br>
   <label for="an">Aantal:</label>
   <input type="text" id="an" name="aantal" placeholder="aantal" required/>
   <br>
   

	<input type='submit' name='insert' value='Toevoegen'>
	</form></br>

	<a href='hoofdpagina.html'>Terug</a>

</body>
</html>



	