<?php

include_once 'classes/verkooporderinzien.php';


$database = new Database("localhost", "root", "", "bas");


$verkooporders = "verkooporders";


$data = $database->getData($verkooporders);


echo "<verkooporders>";
echo "<thead>
		<tr>
			<th>verkOrdId</th>
			<th>klantId</th>
			<th>artId</th>
			<th>verkOrdDatum</th>
			<th>verkOrdBestAantal</th>
			<th>verkOrdStatus</th>
	</tr>
	</thead>";
	echo "<tbody>";
	echo "<br>";
foreach ($data as $row) {
	echo "<tr>";	
    echo "<td>" . $row['verkOrdId'] . "</td>" ; 
    echo "<td>" . $row['klantId'] . "</td>";
    echo "<td>" . $row['artId'] . "</td>";
    echo "<td>" . $row['verkOrdDatum'] . "</td>";
	echo "<td>" . $row['verkOrdBestAantal'] . "</td>";
	echo "<td>" . $row['verkOrdStatus'] . "</td>";
    echo "</tr>";	
}
echo "</tbody>";
echo "</verkooporders>";
echo "<br>";
echo "<a href='hoofdpagina.html'>Terug</a>";



?>
 
