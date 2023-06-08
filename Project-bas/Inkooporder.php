<?php

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){
		
		include_once 'classes/InkoopOrder.php';
		
		$klant = new Klant;
		//$acteur->setObject(0, $_POST['InkOrdId'], $_POST['LevId']);
		//$acteur->insertActeur();
		$klant->insertActeur2($_POST['InkOrdId'], $_POST['LevId'], $_POST['artId'], $_POST['inkOrdDatum'], $_POST['inkOrdBestAantal'], $_POST['inkOrdStatus']);
			
		echo "<script>alert('klant: $_POST[InkOrdId] $_POST[LevId] is toegevoegd')</script>";
		echo "<script> location.replace('confirm.html'); </script>";
			
	} 

?>

<!DOCTYPE html>
<head>

<link rel="stylesheet" href="stylesheet.css">
<title>Bas Inkooporder</title>
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">

</head>
<body>

	<h1>Inkooporder toevoegen</h1>
	<h2>Toevoegen</h2>
	<form method="post">
	<label for="nv">InkOrdId:</label>
   <input type="text" id="nv" name="InkOrdId" placeholder="InkOrdId" required/>
   <br>   
   <label for="an">LevId:</label>
   <input type="text" id="an" name="LevId" placeholder="LevId" required/>
   <br>
   <label for="an">artId:</label>
   <input type="text" id="an" name="artId" placeholder="artId" required/>
   <br>
   <label for="an">inkOrdDatum:</label>
   <input type="text" id="an" name="inkOrdDatum" placeholder="inkOrdDatum" required/>
   <br>
   <label for="an">inkOrdBestAantal:</label>
   <input type="text" id="an" name="inkOrdBestAantal" placeholder="inkOrdBestAantal" required/>
   <br>
   <label for="an">inkOrdStatus:</label>
   <input type="text" id="an" name="inkOrdStatus" placeholder="inkOrdStatus" required/>

	<input type='submit' name='insert' value='Toevoegen'>
	</form></br>

	<a href='hoofdpagina.html'>Terug</a>

</body>
</html>



