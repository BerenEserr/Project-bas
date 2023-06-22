

<!DOCTYPE html>
<html>
<body>
<h1>Artikel Wijzigen</h1>
<h2>Wijzigen</h2>

<?php


    include_once '../classes/Artikel.php';
    $artikel = new Artikel;

    if(isset($_POST["update"]) && $_POST["update"] == "Wijzigen"){

        $artikel->updateArtikel($_POST['artOmschrijving'], $_POST['artInkoop']);
        echo '<script>alert("Artikel is gewijzigd")</script>';
        
        // Toon weer het scherm
        //include "update_form.php";
    }

    if (isset($_GET['artId'])){
        $row = $artikel->getArtikel($_GET['artId']);
    }
?>
	
<form method="post">
<input type="hidden" name="Artid" 
    value="<?php if(isset($row)) { echo $row['artId']; } ?>">
<input type="text" name="artOmschrijving" required 
    value="<?php if(isset($row)) {echo $row['artOmschrijving']; }?>"> *</br>
<input type="text" name="artInkoop" required 
    value="<?php if(isset($row)) {echo $row["artInkoop"]; }?>"> *</br></br>
<input type="submit" name="update" value="Wijzigen">
</form></br>

<a href="readArtikel.php">Terug</a>

</body>
</html>



