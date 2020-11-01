<?php
require("../config.php");
session_start();

echo "<pre>";
var_dump($_POST);

$nbr=2;
    
if(isset($_POST['valider'])){
   $idEtud=$_POST['idEtud'];
    $matiere=$_POST['matiere'];
   $date= $_POST['dateAbs'];
    $heure=$_POST['heure'];
    $justifier=$_POST['jus'];
    $commentaire=$_POST['comm'];
    $id=$_POST['id'];
   // $plm = $conn->query("SELECT * FROM absence WHERE action='Non supprime' && COD_ABSENCE='$id");
  $req="UPDATE absence SET ID_ETUD='$idEtud',ID_MATIERE='$matiere',DATE='$date',NBR_HEURES='$nbr',HEURE='$heure',JUSTIFIER='$justifier',COMM_ABS='$commentaire'  WHERE CODE_ABSENCE ='$id'";                       
   if(mysqli_query($conn,$req)){
     echo "ok....";
   }else{
     echo "error.....";
   }
 

$_SESSION['message']="Absence est bien ajoutée!"; 
//header("location:modifier-supprimer.php");    
}

?>
