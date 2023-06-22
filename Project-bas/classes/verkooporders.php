
	<?php

// Let op voor PRS4 moet de filenaam gelijk zijn aan Classnaam dus Klant.php

include_once 'classes/database.php';

class Klant extends Database{
	public $verkOrdId;
	public $klantId;
	public $artId;
	public $VerkOrdDatum;
	public $VerkOrdBestAantal;
	public $verkOrdStatus;
	private $table_name = "verkooporders";	

	// Methods
	
	/**
	 * Summary of crudKlant
	 * @return void
	 */
	public function crudKlant(){
		// Haal alle klant op uit de database mbv de method getKlant()
		$lijst = $this->getKlanten();

		// Print een HTML tabel van de lijst	
		$this->showTable($lijst);
	}

	/**
	 * Summary of getKlant
	 * @return mixed
	 */
	public function getKlanten(){
		// query: is een prepare en execute in 1 zonder placeholders
		$lijst = self::$conn->query("select * from 	$this->table_name")->fetchAll();
		return $lijst;
	}

	
 /**
  * Summary of getKlant
  * @param int $klantid
  * @return mixed
  */
	public function getKlant(int $klantid){

		$sql = "select * from $this->table_name where klantid = '$klantid'";
		$query = self::$conn->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	
	public function dropDownKlant($row_selected = -1){
	
		// Haal alle klant op uit de database mbv de method getKlant()
		$lijst = $this->getKlant();
		
		echo "<label for='Klant'>Choose a klant:</label>";
		echo "<select name='klantid'>";
		foreach ($lijst as $row){
			if($row_selected == $row["klantid"]){
				echo "<option value='$row[klantid]' selected='selected'> $row[klantnaam] $row[klantEmail]</option>\n";
			} else {
				echo "<option value='$row[klantid]'> $row[klantnaam] $row[klantEmail]</option>\n";
			}
		}
		echo "</select>";
	}

 /**
  * Summary of showTable
  * @param mixed $lijst
  * @return void
  */
	public function showTable($lijst){

		$txt = "<table border=1px>";
		foreach($lijst as $row){
			$txt .= "<tr>";
			$txt .=  "<td>" . $row["klantid"] . "</td>";
			$txt .=  "<td>" . $row["klantnaam"] . "</td>";
			$txt .=  "<td>" . $row["klantEmail"] . "</td>";
			
			//Update
			// Wijzig knopje
        	$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='update.php?klantid=$row[klantid]' >       
                <button name='update'>Wzg</button>	 
            </form> </td>";


			//Delete
			$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='delete.php?klantid=$row[klantid]' >       
                <button name='verwijderen'>Verwijderen</button>	 
            </form> </td>";	
			$txt .= "</tr>";
		}
		$txt .= "</table>";
		echo $txt;
	}

	// Delete klant
 /**
  * Summary of deleteKlant
  * @param mixed $klantid
  * @return bool
  */
	public function deleteKlant(int $klantid){

		$sql = "delete from $this->table_name where klantid = '$klantid'";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
      return ($stmt->rowCount() == 1) ? true : false;
	}


	
	public function updateKlant(int $klantid, string $klantnaam, string $klantEmail){

		$sql = "update $this->table_name 
			set klantnaam = :klantnaam, klantEmail = :klantEmail 
			WHERE klantid = :klantid";
			
		// PDO sanitize automatisch in de prepare
		$stmt = self::$conn->prepare($sql);
		$stmt->execute([
			'klantnaam' => $klantnaam,
			'klantEmail'=> $klantEmail,
			'klantid'=> $klantid
		]);  
	}
	
	
	/**
	 * Summary of BepMaxKlantid
	 * @return int
	 */
	private function BepMaxKlantid() : int {
		
	// Bepaal uniek nummer
	$sql="SELECT MAX(verkOrdId)+1 FROM $this->table_name";
	return  (int) self::$conn->query($sql)->fetchColumn();
}
	
	
	/**
	 * Summary of insertKlant
	 * @param string $klantnaam
	 * @param string $klantEmail
	 * @return mixed
	 */
	public function insertVerkooporder($verkOrdId, $klantId, $artId, $verkOrdDatum, $verkOrdBestAantal, $verkOrdStatus){
		
		// query
		$verkooporder = $this->BepMaxNr();
		$sql = "INSERT INTO verkooporders (verkOrdId, klantId, artId, verkOrdDatum, verkOrdBestAantal, verkOrdStatus)
		VALUES (:verkOrdId, :klantId, :artId, :verkOrdDatum, :verkOrdBestAantal, :verkOrdStatus)";
		
		// Prepare
		$stmt = self::$conn->prepare($sql);
		
		// Execute
		$stmt->execute([
			'verkOrdId'=>$verkOrdId,
			'klantId'=>$klantId,
			'artId'=>$artId,
            'verkOrdDatum'=>$verkOrdDatum,
            'verkOrdBestAantal'=>$verkOrdBestAantal,
			'verkOrdStatus'=>$verkOrdStatus,
		]);			
	}
}



