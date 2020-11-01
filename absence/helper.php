<?php

$conn= mysqli_connect("localhost", "root", "","test");
if (!$conn) {
	exit("Sorry, Connection error..");
}

$val= $_GET["value"];

$val_M = mysqli_real_escape_string($conn, $val);

$sql="SELECT * FROM etudiant WHERE ID_CLASSE='$val_M'";
$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {

	echo "<select>";
    echo "<option>=>Etudiants</option>";

	while ($rows= mysqli_fetch_assoc($result)) {
		echo "<option  value=".$rows["ID_ETUD"].">".$rows["NOM_ETUD"]."\t".$rows["PRENOM_ETUD"]."</option>";
	}

	echo "</select>";
	
} else {
	echo "<select>
			<option>Select</option>
		</select>";
}


?>