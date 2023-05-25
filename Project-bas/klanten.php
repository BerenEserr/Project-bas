<?php

require 'connection.php';


if(isset($_POST["submit"])){
  $klantnaam = $_POST["klantnaam"];
  $klantEmail = $_POST["klantEmail"];
  $klantAdres = $_POST["klantAdres"];
  $KlantPostcode = $_POST["KlantPostcode"];
  $klantWoonplaats = $_POST["klantWoonplaats"];

  $query = "INSERT INTO 'klanten' VALUES('$klantnaam', '$klantEmail', '$klantAdres', '$KlantPostcode', '$klantWoonplaats')";
  mysqli_query($conn,$query);
  echo
  "
  <script> alert('gelukt'); </script>
  ";
}
?>



<!DOCTYPE html>

<head>  
    <link rel="stylesheet" href="stylesheet.css">
        <title>Klant Toevoegen</title>

        <img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">

    <ul class="terugknop"> <li class="terugknop2"><a href="Hoofdpagina.html">Terug</a></li> </ul>

  </head>
  
  
  <body>

    <form id="formulier"> 
      <label>Naam</label>
      <input type="text" name="klantnaam"><br><p>
      <label>Email</label>
      <input type="text" name="klantEmail"><br><p>
      <label>klantAdres</label>
      <input type="text" name="klantAdres"><br><p>
      <label>KlantPostcode</label>
      <input type="text" name="KlantPostcode"><br><p>
      <label>klantWoonplaats</label>
      <input type="text" name="klantWoonplaats"><br><p>
      <button type="submit" name="submit">Submit</button>
    </form>

    <style>
      #formulier{
        margin-left: 200px;
        margin-top: 100px;
        padding: 15px;
      
      }
    </style>

  </body>
</html>