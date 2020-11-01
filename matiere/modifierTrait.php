<?php
session_start();
require('../config.php');
$m=$_POST['matiere'];
$p=$_POST['professeur'];
$f=$_POST['filiere'];
$id=$_POST['id'];

if(isset($_POST['modifier'])){ 
 
  $sql="UPDATE matiere,professeur,filiere SET MATIERE='$m',NOM_PROF='$p',FILIERE='$f'
   WHERE(matiere.ID_PROF=professeur.ID_PROF AND matiere.ID_FILLIERE=filiere.ID_FILLIERE) AND ID_MATIERE='$id' ORDER BY MATIRE";
  mysqli_query($conn,$sql);  

  $_SESSION['messageModi']="Matière est bien modifiee.";
header("location:listerMat.php");
    }
  
?>