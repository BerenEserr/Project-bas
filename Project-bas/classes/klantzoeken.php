<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bas";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $klantid = $_POST["klantid"];

    
    $sql = "SELECT * FROM klanten WHERE klantid = " . $klantid;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            echo "Klant ID: " . $row["klantid"] . "<br>";
            echo "Naam: " . $row["klantnaam"] . "<br>";
            echo "Email: " . $row["klantEmail"] . "<br>";
            echo "klantAdres: " . $row["klantAdres"] . "<br>";
            echo "KlantPostcode: " . $row["KlantPostcode"] . "<br>";
            echo "klantWoonplaats " . $row["klantWoonplaats"] . "<br>";
        }
    } else {
        echo "Geen resultaten gevonden voor klant ID: " . $klantid;
    }

    
    $conn->close();
}
?>