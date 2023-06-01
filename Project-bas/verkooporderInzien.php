<?php

class Database {
    public $host;
    public $username;
    public $password;
    public $database;

    public $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function getData($verkooporders) {
        $query = "SELECT * FROM $verkooporders";
        $result = $this->connection->query($query);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No data found.";
        }
    }
}


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
 
