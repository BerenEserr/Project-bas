<!DOCTYPE html>
<html lang="nl">
<head>
  
<img src="https://seeklogo.com/images/B/bas-logo-8659E994AF-seeklogo.com.gif" alt="logo" >
    <title>Artikelen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="margin: 50px;">
    <h1>Artikelen</h1>
    <br>
    <table class="table">
        <thead>
			<tr>
				<th>ID</th>
				<th>artNaam</th>
				<th>artInkoop</th>
				<th>artVerkoop</th>
				<th>artVoorraad</th>
				<th>artMaxVoorraad</th>
				<th>artLocatie</th>
			</tr>
		</thead>

        <tbody>
            <?php
            $servername = "localhost";
			$username = "root";
			$password = "";
			$database = "bas";

			
			$connection = new mysqli($servername, $username, $password, $database);

            
			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}

            
			$sql = "SELECT * FROM artikelen";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}

          
			while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["artId"] . "</td>
                    <td>" . $row["artOmschrijving"] . "</td>
                    <td>" . $row["artInkoop"] . "</td>
                    <td>" . $row["artVerkoop"] . "</td>
                    <td>" . $row["artVoorraad"] . "</td>
                    <td>" . $row["artMaxVoorraad"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='update'>Update</a>
                        <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
                    </td>
                </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>
	<a href='hoofdpagina.html'>Terug</a>
</body>
</html>