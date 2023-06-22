<?php



include_once '../classes/database.php';

class Artikel extends Database{
	public $artId;
	public $artOmschrijving = null;
	public $artInkoop;
	public $artVerkoop;
    public $artVoorraad;
    public $artMaxVoorraad;
    public $artLocatie;
    public $LevID;
	private $table_name = "artikelen";	

	// Methods
	
	/**
	 * Summary of crudKlant
	 * @return void
	 */
	public function crudArtikel(){
		// Haal alle klant op uit de database mbv de method getKlant()
		$lijst = $this->getArtikelen();

		// Print een HTML tabel van de lijst	
		$this->showTable($lijst);
	}

	/**
	 * Summary of getKlant
	 * @return mixed
	 */
	public function getArtikelen(){
		// query: is een prepare en execute in 1 zonder placeholders
		$lijst = self::$conn->query("select * from 	$this->table_name")->fetchAll();
		return $lijst;
	}

	
 /**
  * Summary of getKlant
  * @param int $artId
  * @return mixed
  */
	public function getArtikel(int $artId){

		$sql = "select * from $this->table_name where artId = '$artId'";
		$query = self::$conn->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	
	public function dropDownKlant($row_selected = -1){
	
		// Haal alle klant op uit de database mbv de method getKlant()
		$lijst = $this->getKlant();
		
		echo "<label for='Klant'>Choose a klant:</label>";
		echo "<select name='artId'>";
		foreach ($lijst as $row){
			if($row_selected == $row["artId"]){
				echo "<option value='$row[artId]' selected='selected'> $row[artOmschrijving] $row[artInkoop]</option>\n";
			} else {
				echo "<option value='$row[artId]'> $row[artOmschrijving] $row[artInkoop]</option>\n";
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
			$txt .=  "<td>" . $row["artId"] . "</td>";
			$txt .=  "<td>" . $row["artOmschrijving"] . "</td>";
			$txt .=  "<td>" . $row["artInkoop"] . "</td>";
			
			//Update
			// Wijzig knopje
        	$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='updateArtikel.php?artId=$row[artId]' >       
                <button name='update'>Wzg</button>	 
            </form> </td>";


			//Delete
			$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='deleteArtikel.php?artId=$row[artId]' >       
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
  * @param mixed $artId
  * @return bool
  */
	public function deleteArtikel(int $artId){

		$sql = "delete from $this->table_name where artId = '$artId'";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
      return ($stmt->rowCount() == 1) ? true : false;
	}


	
	public function updateArtikel($artId, string $artOmschrijving, string $artInkoop){

		$sql = "update $this->table_name 
			set artOmschrijving = :artOmschrijving, artInkoop = :artInkoop 
			WHERE artId = :artId";
			
		// PDO sanitize automatisch in de prepare
		$stmt = self::$conn->prepare($sql);
		$stmt->execute([
			'artOmschrijving' => $artOmschrijving,
			'artInkoop'=> $artInkoop,
			'artId'=> $artId
		]);  
	}
	
	
	/**
	 * Summary of BepMaxartId
	 * @return int
	 */
	private function BepMaxartId() : int {
		
	// Bepaal uniek nummer
	$sql="SELECT MAX(artId)+1 FROM $this->table_name";
	return  (int) self::$conn->query($sql)->fetchColumn();
}
	
	
	/**
	 * Summary of insertKlant
	 * @param string $artOmschrijving
	 * @param string $artInkoop
	 * @return mixed
	 */
	public function insertArtikel(string $artOmschrijving, string $artInkoop){
		
		// query
		$artId = $this->BepMaxartId();
		$sql = "INSERT INTO $this->table_name (artId, artOmschrijving, artInkoop)
		VALUES (:artId, :artOmschrijving, :artInkoop)";
		
		// Prepare
		$stmt = self::$conn->prepare($sql);
		
		// Execute
		return $stmt->execute([
			'artId'=>$artId,
			'artOmschrijving'=>$artOmschrijving,
			'artInkoop'=>$artInkoop

		]);			
	}
}
?>	