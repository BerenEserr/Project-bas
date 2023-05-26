<?php

include_once 'classes/connection.php';

class Klant extends Database{
	public $klantnaam;
	public $klantEmail;
	public $klantAdres;	
	public $klantklantPostcode;
	public $klantWoonplaats;
	// Methods
	
	public function setObject($klantnaam, $klantEmail, $klantAdres, $klantklantPostcode, $klantWoonplaats){
		//self::$conn = $db;
		$this->klantnaam = $klantnaam;
		$this->klantEmail = $klantEmail;
		$this->achternaam = $klantAdres;
		$this->achternaam = $klantPostcode;
		$this->klantWoonplaats = $klantWoonplaats;
	}

		
	/**
	 * Summary of getActeurs
	 * @return mixed
	 */
	public function getActeurs(){
		// query: is een prepare en execute in 1 zonder placeholders
		$lijst = self::$conn->query("select * from 	acteurs")->fetchAll();
		return $lijst;
	}

	// Get acteur
	public function getActeur($nr){

		$sql = "select * from acteurs where NR = '$nr'";
		$query = self::$conn->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	
	public function dropDownActeur($row_selected = -1){
	
		// Haal alle acteurs op uit de database mbv de method getActeurs()
		$lijst = $this->getActeurs();
		
		echo "<label for='Acteurs'>Choose a acteur:</label>";
		echo "<select name='acteurnr'>";
		foreach ($lijst as $row){
			if($row_selected == $row["NR"]){
				echo "<option value='$row[NR]' selected='selected'> $row[VOORNAAM] $row[ACHTERNAAM]</option>\n";
			} else {
				echo "<option value='$row[NR]'> $row[VOORNAAM] $row[ACHTERNAAM]</option>\n";
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
			$txt .=  "<td>" . $row["NR"] . "</td>";
			$txt .=  "<td>" . $row["VOORNAAM"] . "</td>";
			$txt .=  "<td>" . $row["ACHTERNAAM"] . "</td>";
			
			//Update
			// Wijzig knopje
        	$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='update_acteur.php?nr=$row[NR]' >       
                <button name='update'>Wzg</button>	 
            </form> </td>";


			//Delete
			$txt .=  "<td>";
			$txt .= " 
            <form method='post' action='delete.php?nr=$row[NR]' >       
                <button name='verwijderen'>Verwijderen</button>	 
            </form> </td>";	
			$txt .= "</tr>";
		}
		$txt .= "</table>";
		echo $txt;
	}

	// Delete acteur
 /**
  * Summary of deleteActeur
  * @param mixed $nr
  * @return bool
  */
	public function deleteActeur($nr){

		$sql = "delete from acteurs where NR = '$nr'";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
      return ($stmt->rowCount() == 1) ? true : false;
	}

	public function updateActeur2($nr, $naam, $achternaam){

		$sql = "update acteurs 
			set VOORNAAM = '$naam', ACHTERNAAM = '$achternaam' 
			WHERE NR = '$nr'";

		$stmt = self::$conn->prepare($sql);
		$stmt->execute(); 
		return ($stmt->rowCount() == 1) ? true : false;				
	}
	
	public function updateActeurSanitized($nr, $voornaam, $achternaam){

		$sql = "update acteurs 
			set VOORNAAM = :voornaam, ACHTERNAAM = :achternaam 
			WHERE NR = :nr";
			
		// PDO sanitize automatisch in de prepare
		$stmt = self::$conn->prepare($sql);
		$stmt->execute([
			'voornaam' => $voornaam,
			'achternaam'=> $achternaam,
			'nr'=> $nr
		]);  
	}
	public function updateActeur(){
		// Voor deze functie moet eerst een setObject aangeroepen worden om $this te vullen
		$sql = "update acteurs 
			set VOORNAAM = :voornaam, ACHTERNAAM = :achternaam 
			WHERE NR = :nr";

		$stmt = self::$conn->prepare($sql);
		$stmt->execute((array)$this);
		return ($stmt->rowCount() == 1) ? true : false;		
	}
	
	/**
	 * Summary of BepMaxNr
	 * @return int
	 */
	private function BepMaxNr() : int {
		
	// Bepaal uniek nummer
	$sql="SELECT MAX(NR)+1 FROM klanten";
	return  (int) self::$conn->query($sql)->fetchColumn();
}
	
	public function insertActeur(){
		// Voor deze functie moet eerst een setObject aangeroepen worden om $this te vullen
		
		//
		$klantnaam = $this->BepMaxNr();;
		
		$sql = "INSERT INTO klanten (klantnaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats)
		VALUES (:klantnaam, :klantEmail, :klantAdres, :klantPostcode, :klantWoonplaats)";

		$stmt = self::$conn->prepare($sql);
		return $stmt->execute((array)$this);
			
	}
	
	/**
	 * Summary of insertActeur2
	 * @param mixed $voornaam
	 * @param mixed $achternaam
	 * @return void
	 */
	public function insertActeur2($klantnaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats){
		
		// query
		$klantnaam = $this->BepMaxNr();
		$sql = "INSERT INTO klanten (klantnaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats)
		VALUES (:klantnaam, :klantEmail, :klantAdres, :klantPostcode, :klantWoonplaats)";
		
		// Prepare
		$stmt = self::$conn->prepare($sql);
		
		// Execute
		$stmt->execute([
			'klantnaam'=>$klantnaam,
			'klantEmail'=>$klantEmail,
			'klantAdres'=>$klantAdres,
            'klantPostcode'=>$klantPostcode,
            'klantWoonplaats'=>$klantWoonplaats,
		]);			
	}
}
?>