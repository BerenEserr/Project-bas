

<!DOCTYPE html>
<html>
<body>
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo">
<h1>Bas Klant</h1>
<h2>Wijzigen</h2>

<?php


    include_once '../classes/Klant.php';
    $acteur = new Klant;

    if(isset($_POST["update"]) && $_POST["update"] == "Wijzigen"){

        $acteur->updateKlant($_POST['klantid'], $_POST['klantnaam'], $_POST['klantemail']);
        echo '<script>alert("Klant is gewijzigd")</script>';
        
        // Toon weer het scherm
        //include "update_form.php";
    }

    if (isset($_GET['klantid'])){
        $row = $acteur->getKlant($_GET['klantid']);
    }
?>
	
<form method="post">
<input type="hidden" name="klantid" 
    value="<?php if(isset($row)) { echo $row['klantid']; } ?>">
<input type="text" name="klantnaam" required 
    value="<?php if(isset($row)) {echo $row['klantnaam']; }?>"> *</br>
<input type="text" name="klantemail" required 
    value="<?php if(isset($row)) {echo $row["klantEmail"]; }?>"> *</br></br>
<input type="submit" name="update" value="Wijzigen">
</form></br>

<a href="read.php">Terug</a>

</body>
</html>



