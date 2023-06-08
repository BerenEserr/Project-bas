<?php

include_once 'classes/Artikeleninzien.php';


$database = new Database("localhost", "root", "", "bas");


$artikelen = "artikelen";


$data = $database->getData($artikelen);


echo "<artikelen>";
echo "<thead>
		<tr>
			<th>artId</th>
			<th>artOmschrijving</th>
			<th>artInkoop</th>
			<th>artVerkoop</th>
			<th>artVoorraad</th>
			<th>artMaxVoorraad</th>
            <th>artLocatie</th>
            <th>LevID</th>
	</tr>
	</thead>";
	echo "<tbody>";
	echo "<br>";
foreach ($data as $row) {
	echo "<tr>";	
    echo "<td>" . $row['artId'] . "</td>" ; 
    echo "<td>" . $row['artOmschrijving'] . "</td>";
    echo "<td>" . $row['artInkoop'] . "</td>";
    echo "<td>" . $row['artVerkoop'] . "</td>";
	echo "<td>" . $row['artVoorraad'] . "</td>";
	echo "<td>" . $row['artMaxVoorraad'] . "</td>";
    echo "<td>" . $row['artLocatie'] . "</td>";
    echo "<td>" . $row['LevID'] . "</td>";
    
    echo "</tr>";	
}
echo "</tbody>";
echo "</artikelen>";
echo "<br>";
echo "<a href='hoofdpagina.html'>Terug</a>";



?>
 
